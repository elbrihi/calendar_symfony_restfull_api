<?php

namespace SportRadar\CalendarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Sport
 *
 * @ORM\Table(name="sport")
 * @ORM\Entity(repositoryClass="SportRadar\CalendarBundle\Repository\SportRepository")
 */
class Sport
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string")
     */
    private $title;

     /**
     * @ORM\OneToMany(targetEntity="Event", mappedBy="sport") //  it means that Pice is the subgroupe of Place
     * @var Sport
     */
    private $events;
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->events = new ArrayCollection();
    }
    /**
     * Set title
     *
     * @param string $title
     *
     * @return Sport
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    
    public function setEvents($events)
    {
        $this->events = $events;

        return $this;
    }

    
    public function getEvents()
    {
        return $this->events;
    }
    public function __toString()
    {
    return $this->getTitle();
    }
    
}

