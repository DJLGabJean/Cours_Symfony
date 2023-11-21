<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Repository\BurgerRepository;
use Doctrine\ORM\Mapping as ORM;



#[ORM\Entity(repositoryClass: BurgerRepository::class)]
class Burger
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
 
    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Pain $pain = null;

    #[ORM\OneToMany(targetEntity: Oignon::class, mappedBy: 'burger')]
    private Collection $oignons;

    #[ORM\OneToMany(targetEntity: Sauce::class, mappedBy: 'burger')]
    private Collection $sauces;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Image $image = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Commentaire $commentaire = null;



    public function __construct()
    {
        $this->oignons = new ArrayCollection();
        $this->sauces = new ArrayCollection();
    }



    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function setPain(Pain $pain): self
    {
        $this->pain = $pain;
        return $this;
    }

    public function getOignons(): Collection
    {
        return $this->oignons;
    }

    public function getSauces(): Collection
    {
        return $this->sauces;
    }
    
    public function setImage(Image $image): self
    {
        $this->image = $image;
        return $this;
    }

    public function setCommentaire(Commentaire $commentaire): self
    {
        $this->commentaire = $commentaire;
        return $this;
    }

    public function addOignon(Oignon $oignon): self
    {
        if (!$this->oignons->contains($oignon)) {
            $this->oignons[] = $oignon;
            $oignon->setBurger($this); 
        }

        return $this;
    }
    public function removeOignon(Oignon $oignon): self
    {
        if ($this->oignons->contains($oignon)) {
            $this->oignons->removeElement($oignon);
            
            if ($oignon->getBurger() === $this) {
                $oignon->setBurger(null);
            }
        }
        return $this;
    }

    public function addSauce(Sauce $sauce): self
    {
        if (!$this->sauces->contains($sauce)) {
            $this->sauces[] = $sauce;
            $sauce->setBurger($this); 
        }

        return $this;
    }

    public function removeSauce(Sauce $sauce): self
    {
        if ($this->sauces->contains($sauce)) {
            $this->sauces->removeElement($sauce);
            
            if ($sauce->getBurger() === $this) {
                $sauce->setBurger(null);
            }
        }
        return $this;
    }

}

?>

