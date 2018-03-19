<?php
/**
 * Created by PhpStorm.
 * User: aminos
 * Date: 2/25/18
 * Time: 9:11 PM
 */

namespace BlogBundle\Feed;


use Debril\RssAtomBundle\Exception\FeedException\FeedNotFoundException;
use Debril\RssAtomBundle\Provider\FeedContentProviderInterface;
use Doctrine\ORM\EntityManager;
use EntiteBundle\Entity\Article;
use FeedIo\Feed;
use FeedIo\Feed\Item;
use FeedIo\FeedInterface;

class RssProvider implements FeedContentProviderInterface
{
    /**
     * RssProvider constructor.
     */
    protected  $em;
    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * @param array $options
     *
     * @throws FeedNotFoundException
     *
     * @return FeedInterface
     */
    public function getFeedContent(array $options)
    {
        $feed = new Feed();
        $feed->setTitle('RSS du blog BonPlan');

        foreach($this->fetchFromStorage() as $storedItem) {
            $item = new Item();
            $item->setTitle($storedItem->getTitre());
            $item->setDescription(substr($storedItem->getTexte(), 0, 10));
            $item->setLink("http://localhost:8000/blog/lireArticle/".$storedItem->getId());
            $item->setLastModified($storedItem->getUpdated());
            $feed->add($item);
        }
        $feed->setDescription("Flux rss du blog BonPlan");
        $feed->setLastModified(new \DateTime());
        return $feed;
    }

    public function fetchFromStorage()
    {

        $res =  $this->em->getRepository(Article::class)
            ->findAll();
        return $res;
    }
}