<?php

/**
 * (c) FSi sp. z o.o <info@fsi.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FSi\Bundle\TerytDatabaseBundle\Model\Place;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FSi\Bundle\TerytDatabaseBundle\Model\Territory\Community;

class Place
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Type
     */
    protected $type;

    /**
     * @var Community
     */
    protected $community;

    /**
     * @var Collection|Street[]
     */
    protected $streets;

    /**
     * @var Place
     */
    protected $parentPlace;

    /**
     * @var Collection|Place[]
     */
    protected $childPlaces;

    /**
     * @param int $id
     */
    function __construct($id)
    {
        $this->id = $id;
        $this->streets = new ArrayCollection();
        $this->childPlaces = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param Community $community
     * @return Place
     */
    public function setCommunity(Community $community)
    {
        $this->community = $community;

        return $this;
    }

    /**
     * @return Community
     */
    public function getCommunity()
    {
        return $this->community;
    }

    /**
     * @param string $name
     * @return Place
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param Type $type
     * @return Place
     */
    public function setType(Type $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return Collection|Street[]
     */
    public function getStreets()
    {
        return $this->streets;
    }

    /**
     * @return Place
     */
    public function getParentPlace()
    {
        return $this->parentPlace;
    }

    /**
     * @param Place $parentPlace
     */
    public function setParentPlace(Place $parentPlace = null)
    {
        $this->parentPlace = $parentPlace;
    }

    /**
     * @return Collection|Place[]
     */
    public function getChildPlaces()
    {
        return $this->childPlaces;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return sprintf('%s (%s)', $this->name, $this->type->getName());
    }
}
