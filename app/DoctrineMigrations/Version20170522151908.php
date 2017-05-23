<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170522151908 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        /**
         *
         * == Medicament ==
         *      ** id
         *      nom
         *      infos_complementaires
         */

        $sql = <<<SQL
CREATE TABLE IF NOT EXISTS `medicament` (
  `id` INTEGER  NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(512) NOT NULL,
  `infos_complementaires` TEXT NULL,
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
DROP TABLE IF EXISTS `medicament`;
SQL;

        $this->addSql($sql);

    }
}
