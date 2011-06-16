
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- surveys_survey
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `surveys_survey`;

CREATE TABLE `surveys_survey`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT COMMENT 'Id Encuesta',
	`name` VARCHAR(255) NOT NULL COMMENT 'Pregunta de la encuesta',
	`isPublic` TINYINT DEFAULT 1 NOT NULL COMMENT 'Es publica?',
	`startDate` DATE NOT NULL COMMENT 'Fecha de inicio de la encuesta',
	`endDate` DATE NOT NULL COMMENT 'Fecha de finalizacion de la encuesta',
	`deleted_at` DATETIME,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM CHARACTER SET='utf8' COLLATE='utf8_general_ci' COMMENT='Encuestas';

-- ---------------------------------------------------------------------
-- surveys_question
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `surveys_question`;

CREATE TABLE `surveys_question`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT COMMENT 'Id Encuesta',
	`surveyId` INTEGER NOT NULL COMMENT 'Id Encuesta',
	`question` VARCHAR(255) NOT NULL COMMENT 'Pregunta de la encuesta',
	`multipleAnswer` TINYINT DEFAULT 0 COMMENT 'Soporta seleccion de multiples respuestas?',
	PRIMARY KEY (`id`),
	INDEX `surveys_question_FI_1` (`surveyId`),
	CONSTRAINT `surveys_question_FK_1`
		FOREIGN KEY (`surveyId`)
		REFERENCES `surveys_survey` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM CHARACTER SET='utf8' COLLATE='utf8_general_ci' COMMENT='Pregunta a Encuesta';

-- ---------------------------------------------------------------------
-- surveys_answerOption
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `surveys_answerOption`;

CREATE TABLE `surveys_answerOption`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT COMMENT 'Id de pregunta de encuesta',
	`questionId` INTEGER NOT NULL COMMENT 'Id de Pregunta',
	`answer` VARCHAR(255) NOT NULL COMMENT 'Respuesta de la encuesta',
	PRIMARY KEY (`id`),
	INDEX `surveys_answerOption_FI_1` (`questionId`),
	CONSTRAINT `surveys_answerOption_FK_1`
		FOREIGN KEY (`questionId`)
		REFERENCES `surveys_question` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM CHARACTER SET='utf8' COLLATE='utf8_general_ci' COMMENT='Opciones de respuesta para una determinada Pregunta';

-- ---------------------------------------------------------------------
-- surveys_answer
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `surveys_answer`;

CREATE TABLE `surveys_answer`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT COMMENT 'Id Encuesta',
	`questionId` INTEGER NOT NULL COMMENT 'Id de Pregunta',
	`answerOptionId` INTEGER NOT NULL COMMENT 'Id de Respuesta Seleccionada',
	`objectId` INTEGER COMMENT 'Id del objeto que genero la respuesta',
	`objectType` VARCHAR(50) COMMENT 'Tipo de objeto que genero la respuesta',
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `surveys_answer_FI_1` (`questionId`),
	INDEX `surveys_answer_FI_2` (`answerOptionId`),
	CONSTRAINT `surveys_answer_FK_1`
		FOREIGN KEY (`questionId`)
		REFERENCES `surveys_question` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `surveys_answer_FK_2`
		FOREIGN KEY (`answerOptionId`)
		REFERENCES `surveys_answerOption` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM CHARACTER SET='utf8' COLLATE='utf8_general_ci' COMMENT='Respuesta seleccionada al realizar una encuesta por un usuario publico o registrado';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
