<?php
namespace App\RdfHandler;

class Data
{
    /** @var string */
    private $title;

    /** @var \DateTime */
    private $date;

    /** @var string */
    private $url;

    /** @var array */
    private $authors;

    /**
     * @param string $title
     * @param \DateTime $date
     * 
     * @return Data
     */
    public static function create(string $title, \DateTime $date, array $authors, string $url): Data
    {
        $object = new self();
        $object->setTitle($title);
        $object->setDate($date);
        $object->setAuthors($authors);
        $object->setUrl($url);

        return $object;
    }

    /**
     * @param string $title
     * 
     * @return Data
     */
    public function setTitle(string $title): Data
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param \DateTime $date
     * 
     * @return Data
     */
    public function setDate(\DateTime $date): Data
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param array $authors
     * 
     * @return Data
     */
    public function setAuthors(array $authors): Data
    {
        $this->authors = $authors;

        return $this;
    }

    /**
     * @return array
     */
    public function getAuthors(): array
    {
        return $this->authors;
    }

    /**
     * @param string $url
     * 
     * @return Data
     */
    public function setUrl(string $url): Data
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}
