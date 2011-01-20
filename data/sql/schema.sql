CREATE TABLE author (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE book (id BIGINT AUTO_INCREMENT, title VARCHAR(255) NOT NULL, author_id BIGINT, publisher_id BIGINT, isbn VARCHAR(255) NOT NULL, year BIGINT NOT NULL, description TEXT, image VARCHAR(255), rating FLOAT(18, 2), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX author_id_idx (author_id), INDEX publisher_id_idx (publisher_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE publisher (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE book ADD CONSTRAINT book_publisher_id_publisher_id FOREIGN KEY (publisher_id) REFERENCES publisher(id) ON DELETE SET NULL;
ALTER TABLE book ADD CONSTRAINT book_author_id_author_id FOREIGN KEY (author_id) REFERENCES author(id) ON DELETE SET NULL;
