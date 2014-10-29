<?php
namespace Demo;

/**
 * @Entity notes
 */
class Note implements \JsonSerializable {
	/**
	 * @Id
	 * @Type int
	 */
	private $id;
	
	/**
	 * @Type string
	 */
	private $title;
	
	/**
	 * @Type string
	 */
	private $body;
	
	/**
	 * @Type string
	 * @Column created_at
	 */
	private $createdAt;
	
	public function getId() {
		return $this->id;
	}
	
	public function setTitle($title) {
		$this->title = $title;
	}
	
	public function getTitle() {
		return $this->title;
	}
	
	public function setBody($body) {
		$this->body = $body;
	}
	
	public function getBody() {
		return $this->body;
	}
	
	public function setCreatedAt($createdAt) {
		$this->createdAt = $createdAt;
	}
	
	public function getCreatedAt() {
		return $this->createdAt;
	}
	
	public function jsonSerialize() {
		return [
			'id' => $this->id,
			'title' => $this->title,
			'body' => $this->body,
			'createdAt' => $this->createdAt
		];
	}
}
