<?php
namespace Demo;

/**
 * @Entity contacts
 */
class Contact implements \JsonSerializable {
	/**
	 * @Id
	 * @Type int
	 */
	private $id;
	
	/**
	 * @Type string
	 */
	private $name;
	
	/**
	 * @Type string
	 */
	private $surname;
	
	/**
	 * @Type string
	 */
	private $phone;
	
	/**
	 * @Type string
	 */
	private $email;
	
	/**
	 * @Type string
	 */
	private $twitter;
	
	public function getId() {
		return $this->id;
	}
	
	public function setName($name) {
		$this->name = $name;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function setSurname($surname) {
		$this->surname = $surname;
	}
	
	public function getSurname() {
		return $this->surname;
	}
	
	public function setPhone($phone) {
		$this->phone = $phone;
	}
	
	public function getPhone() {
		return $this->phone;
	}
	
	public function setEmail($email) {
		$this->email = $email;
	}
	
	public function getEmail() {
		return $this->email;
	}
	
	public function setTwitter($twitter) {
		$this->twitter = $twitter;
	}
	
	public function getTwitter() {
		return $this->twitter;
	}
	
	public function jsonSerialize() {
		return [
			'id' => $this->id,
			'name' => $this->name,
			'surname' => $this->surname,
			'phone' => $this->phone,
			'email' => $this->email,
			'twitter' => $this->twitter
		];
	}
}
