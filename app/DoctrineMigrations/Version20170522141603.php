<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170522141603 extends AbstractMigration
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
CREATE TABLE IF NOT EXISTS `medecin` (
  `id` INTEGER  NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(512) NOT NULL,
  `prenom` VARCHAR(512) NOT NULL,
  `date_de_naissance` datetime DEFAULT NULL,
  `infos_complementaires` TEXT NULL,
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
CREATE TABLE IF NOT EXISTS `hopital_has_medecin` (
  `hopital_id` INT(11) NOT NULL,
  `medecin_id` INT(11) NOT NULL,
   PRIMARY KEY(hopital_id, medecin_id),
   CONSTRAINT hopital_has_medecin_hopital_id FOREIGN KEY (hopital_id) REFERENCES hopital (id),
   CONSTRAINT hopital_has_medecin_medecin_id FOREIGN KEY (medecin_id) REFERENCES medecin (id)
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
DROP TABLE IF EXISTS `hopital_has_medecin`;
DROP TABLE IF EXISTS `medecin`;
SQL;

        $this->addSql($sql);

    }
}
