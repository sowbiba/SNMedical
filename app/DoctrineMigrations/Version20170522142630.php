<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170522142630 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        /**
         *
         * == Patient ==
         *      ** id
         *      nom
         *      prenom
         *      date_de_naissance
         *      infos_complementaires
         *      * medecin_traitant_id
         */

        $sql = <<<SQL
CREATE TABLE IF NOT EXISTS `patient` (
  `id` INTEGER  NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(512) NOT NULL,
  `prenom` VARCHAR(512) NOT NULL,
  `date_de_naissance` datetime DEFAULT NULL,
  `infos_complementaires` TEXT NULL,
  `medecin_traitant_id` INT(11) NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
   PRIMARY KEY (`id`),
   CONSTRAINT patient_has_medecin_traitant_id FOREIGN KEY (medecin_traitant_id) REFERENCES medecin (id)
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
DROP TABLE IF EXISTS `patient`;
SQL;

        $this->addSql($sql);

    }
}
