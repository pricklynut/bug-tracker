<?php

namespace App\Helper;

use App\Components\AbstractComponent;

/**
 * Class Pager
 */
class Pager extends AbstractComponent
{
    /**
     * @var int
     */
    protected $perPage = 5;

    /**
     * @var bool
     */
    protected $showFirstAndLast = true;

    /**
     * @var int
     */
    protected $linksOnPage = 5;

    /**
     * @var int
     */
    protected $currentPage;

    /**
     * @var int
     */
    protected $totalCount;

    /**
     * @return int
     */
    public function getCurrentPage()
    {
        if ($this->currentPage < 0) {
            $this->currentPage = 1;
        } elseif ($this->currentPage > $this->getTotalPages()) {
            $this->currentPage = $this->getTotalPages();
        }

        return $this->currentPage;
    }

    /**
     * @param int $currentPage
     */
    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;
    }

    /**
     * @return int
     */
    public function getPerPage()
    {
        return $this->perPage;
    }

    /**
     * @param int $perPage
     */
    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
    }

    /**
     * @return bool
     */
    public function isShowFirstAndLast()
    {
        return $this->showFirstAndLast;
    }

    /**
     * @param bool $showFirstAndLast
     */
    public function setShowFirstAndLast($showFirstAndLast)
    {
        $this->showFirstAndLast = $showFirstAndLast;
    }

    /**
     * @return int
     */
    public function getLinksOnPage()
    {
        return $this->linksOnPage;
    }

    /**
     * @param int $linksOnPage
     */
    public function setLinksOnPage($linksOnPage)
    {
        $this->linksOnPage = $linksOnPage;
    }

    /**
     * @return int
     */
    public function getTotalCount()
    {
        return $this->totalCount;
    }

    /**
     * @param int $totalCount
     */
    public function setTotalCount($totalCount)
    {
        $this->totalCount = $totalCount;
    }

    /**
     * @return int
     */
    public function getTotalPages()
    {
        return intval(ceil($this->totalCount/$this->perPage));
    }

    /**
     * @return int
     */
    public function getOffset()
    {
        return ($this->getCurrentPage() - 1) * $this->perPage;
    }

    /**
     * @return int
     */
    public function getFirstPage()
    {
        if ($this->getCurrentPage() <= $this->getLinksOnPage()) {
            return 1;
        }

        if (
            $this->getCurrentPage() + $this->getLinksOnPage()
            >
            $this->getTotalPages()
        ) {
            return $this->getTotalPages() - $this->getLinksOnPage() + 1;
        }

        return intval(floor($this->getCurrentPage()/$this->getLinksOnPage()))
            * $this->getLinksOnPage() + 1;
    }

    /**
     * @return int
     */
    public function getLastPage()
    {
        if ($this->getCurrentPage() <= $this->getLinksOnPage()) {
            return $this->getLinksOnPage();
        }

        if (
            $this->getCurrentPage() + $this->getLinksOnPage()
            >
            $this->getTotalPages()
        ) {
            return $this->getTotalPages();
        }

        return $this->getFirstPage() + $this->getLinksOnPage() - 1;
    }

    /**
     * @return bool
     */
    public function isPreviousActive()
    {
        return $this->getCurrentPage() > 1;
    }

    /**
     * @return int
     */
    public function getPreviousPage()
    {
        if ($this->getCurrentPage() === 1) {
            return 1;
        }
        return $this->getCurrentPage() - 1;
    }

    /**
     * @return bool
     */
    public function isNextActive()
    {
        return $this->getCurrentPage() < $this->getTotalPages();
    }

    /**
     * @return int
     */
    public function getNextPage()
    {
        if ($this->getCurrentPage() === $this->getTotalPages()) {
            return $this->getCurrentPage();
        }
        return $this->getCurrentPage() + 1;
    }

    /**
     * @return bool
     */
    public function hasPagination()
    {
        return $this->getTotalPages() > 1;
    }

}
