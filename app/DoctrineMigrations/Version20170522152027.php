<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170522152027 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        /**
         *
         * == Medecin ==
         *      ** id
         *      nom
         *      prenom
         *      date_de_naissance
         *      infos_complementaires
         */

        $sql = <<<SQL
CREATE TABLE IF NOT EXISTS `ordonnance` (
  `id` INTEGER  NOT NULL AUTO_INCREMENT,
  `infos_complementaires` TEXT NULL,
  `consultation_id` INT(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
   PRIMARY KEY (`id`)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
SQL;

        $this->addSql($sql);

        /**
         *
         * == Hopital - Medecin ==
         *      ** hopital_id
         *      ** medecin_id
         */

        $sql = <<<SQL
CREATE TABLE IF NOT EXISTS `ordonnance_has_medicament` (
  `ordonnance_id` INT(11) NOT NULL,
  `medicament_id` INT(11) NOT NULL,
  `quantite` INT(11) NULL,
  `indications` TEXT NULL,
   PRIMARY KEY(ordonnance_id, medicament_id),
   CONSTRAINT ordonnance_has_medicament_ordonnance_id FOREIGN KEY (ordonnance_id) REFERENCES ordonnance (id),
   CONSTRAINT ordonnance_has_medicament_medicament_id FOREIGN KEY (medicament_id) REFERENCES medicament (id)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
SQL;

        $this->addSql($sql);

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $sql = <<<SQL
DROP TABLE IF EXISTS `ordonnance_has_medicament`;
DROP TABLE IF EXISTS `ordonnance`;
SQL;

        $this->addSql($sql);

    }
}
