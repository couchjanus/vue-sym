<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
#[ApiResource(
    normalizationContext: ['groups' => ['product', 'products']],
    collectionOperations: [
        'get' => [
            'method' => 'get'
        ],
    ],
    itemOperations: [
        'get' => [
            'method' => 'get',
        ],
    ],
)]
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"products", "product"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"products", "product"})
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     * @Groups({"product"})
     */
    private $description;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     * @Groups({"products", "product"})
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"product"})
     */
    private $quantity;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=Brand::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"products", "product"})
     */
    private $brand;

    /**
     * @ORM\OneToMany(targetEntity=BookingItem::class, mappedBy="product")
     */
    private $bookingItems;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"products", "product"})
     */
    private $cover;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"products", "product"})
     */
    private $ribbon;

    public function __construct()
    {
        $this->bookingItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return Collection|BookingItem[]
     */
    public function getBookingItems(): Collection
    {
        return $this->bookingItems;
    }

    public function addBookingItem(BookingItem $bookingItem): self
    {
        if (!$this->bookingItems->contains($bookingItem)) {
            $this->bookingItems[] = $bookingItem;
            $bookingItem->setProduct($this);
        }

        return $this;
    }

    public function removeBookingItem(BookingItem $bookingItem): self
    {
        if ($this->bookingItems->removeElement($bookingItem)) {
            // set the owning side to null (unless already changed)
            if ($bookingItem->getProduct() === $this) {
                $bookingItem->setProduct(null);
            }
        }

        return $this;
    }

    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setCover(string $cover): self
    {
        $this->cover = $cover;

        return $this;
    }

    public function getRibbon(): ?int
    {
        return $this->ribbon;
    }

    public function setRibbon(?int $ribbon): self
    {
        $this->ribbon = $ribbon;

        return $this;
    }
}
