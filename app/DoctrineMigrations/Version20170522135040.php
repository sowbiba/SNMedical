<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170522135040 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        /**
         *
         * == Hopital ==
         *      ** id
         *      nom
         *      localisation
         *      description
         */

        $sql = <<<SQL
CREATE TABLE IF NOT EXISTS `hopital` (
  `id` INTEGER  NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(512) NOT NULL,
  `localisation` TEXT NULL,
  `description` TEXT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
   PRIMARY KEY (`id`)
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
DROP TABLE IF EXISTS `hopital`;
SQL;

        $this->addSql($sql);

    }
}
