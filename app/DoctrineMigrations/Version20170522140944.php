<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170522140944 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        /**
         *
         * == Administrateur ==
         *      ** id
         *      * hopital_id
         *      nom
         *      prenom
         *      date_de_naissance
         *      infos_complementaires
         */

        $sql = <<<SQL
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id` INTEGER  NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(512) NOT NULL,
  `prenom` VARCHAR(512) NOT NULL,
  `date_de_naissance` datetime DEFAULT NULL,
  `infos_complementaires` TEXT NULL,
  `hopital_id` INT(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
   PRIMARY KEY (`id`),
   CONSTRAINT `administrateur_hopital_id`
     FOREIGN KEY (`hopital_id`)
     REFERENCES `hopital` (`id`)
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
DROP TABLE IF EXISTS `administrateur`;
SQL;

        $this->addSql($sql);

    }
}
