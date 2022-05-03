<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220503100047 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, number_people_id INT DEFAULT NULL, date DATE NOT NULL, time TIME NOT NULL, full_name VARCHAR(255) NOT NULL, phone_number VARCHAR(50) NOT NULL, INDEX IDX_E00CEDDE1CC5344E (number_people_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, category_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE checkout (id INT AUTO_INCREMENT NOT NULL, table_number_id INT DEFAULT NULL, account_holder_name VARCHAR(255) NOT NULL, card_number VARCHAR(255) NOT NULL, expiry_date DATE NOT NULL, security_code INT NOT NULL, INDEX IDX_AF382D4EB6E2B1EA (table_number_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, order_status_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, time_placed DATETIME NOT NULL, INDEX IDX_F5299398D7707B45 (order_status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_status (id INT AUTO_INCREMENT NOT NULL, status_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, product_name VARCHAR(255) NOT NULL, product_price DOUBLE PRECISION NOT NULL, is_available TINYINT(1) NOT NULL, product_description VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_D34A04AD12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `table` (id INT AUTO_INCREMENT NOT NULL, status_id INT DEFAULT NULL, number INT NOT NULL, capacity INT NOT NULL, INDEX IDX_F6298F466BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE table_status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE1CC5344E FOREIGN KEY (number_people_id) REFERENCES `table` (id)');
        $this->addSql('ALTER TABLE checkout ADD CONSTRAINT FK_AF382D4EB6E2B1EA FOREIGN KEY (table_number_id) REFERENCES `table` (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398D7707B45 FOREIGN KEY (order_status_id) REFERENCES order_status (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE `table` ADD CONSTRAINT FK_F6298F466BF700BD FOREIGN KEY (status_id) REFERENCES table_status (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398D7707B45');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE1CC5344E');
        $this->addSql('ALTER TABLE checkout DROP FOREIGN KEY FK_AF382D4EB6E2B1EA');
        $this->addSql('ALTER TABLE `table` DROP FOREIGN KEY FK_F6298F466BF700BD');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE checkout');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_status');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE `table`');
        $this->addSql('DROP TABLE table_status');
        $this->addSql('DROP TABLE user');
    }
}
