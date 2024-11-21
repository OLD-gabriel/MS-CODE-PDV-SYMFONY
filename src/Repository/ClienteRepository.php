<?php

namespace App\Repository;

use App\Entity\Cliente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cliente>
 */
class ClienteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cliente::class);
    }

    public function Adicionar(Cliente $cliente): void
    {
        $this->getEntityManager()->persist($cliente);
        $this->getEntityManager()->flush();
    }

    public function excluir($id): bool
    {
        $cliente = $this->find($id);
        
        if($cliente == NULL){
            return false;
        }

        $this->getEntityManager()->remove($cliente);
        $this->getEntityManager()->flush();

        return True;
    }

    public function editar($id,$nome): bool
    {
        $cliente = $this->find($id);

        $cliente->setNome($nome);

        $this->getEntityManager()->persist($cliente);
        $this->getEntityManager()->flush();

        return True;
    }

}
