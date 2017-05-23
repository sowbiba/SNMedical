<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170522151530 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        /**
         *
         * == Consultation ==
         *      ** id
         *      rapport
         *      * patient_id
         *      * medecin_id
         *      status (0 = programmée - 1 = terminée)
         */

        $sql = <<<SQL
CREATE TABLE IF NOT EXISTS `consultation` (
  `id` INTEGER  NOT NULL AUTO_INCREMENT,
  `rapport` TEXT NULL,
  `patient_id` INT(11) NOT NULL,
  `medecin_id` INT(11) NOT NULL,
  `status` INT(11) NOT NULL DEFAULT 0 COMMENT '0 = Programmée / 1 = Terminée',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
   PRIMARY KEY (`id`),
   CONSTRAINT consultation_patient_id FOREIGN KEY (patient_id) REFERENCES patient (id),
   CONSTRAINT consultation_medecin_id FOREIGN KEY (medecin_id) REFERENCES medecin (id)
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
DROP TABLE IF EXISTS `consultation`;
SQL;

        $this->addSql($sql);

    }
}
