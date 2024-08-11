CREATE TABLE `crudlivros`.`livros` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(255) NOT NULL,
  `autor` VARCHAR(45) NOT NULL,
  `data_lancamento` DATE NOT NULL,
  `editora` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));