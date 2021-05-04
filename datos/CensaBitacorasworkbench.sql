SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`TipoDocumento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`TipoDocumento` (
  `IdTipoDocumento` INT NOT NULL AUTO_INCREMENT ,
  `Documento` VARCHAR(45) NULL ,
  PRIMARY KEY (`IdTipoDocumento`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Estudiantes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Estudiantes` (
  `IdEstudiante` INT NOT NULL AUTO_INCREMENT ,
  `Documento` VARCHAR(45) NULL ,
  `Nombre` VARCHAR(45) NULL ,
  `Apellido` VARCHAR(45) NULL ,
  `FechaInicio` DATETIME NULL ,
  `IdTipoDocumento` INT NULL ,
  `IdPrograma` INT NULL ,
  `Telefono` INT NULL ,
  `Correo` VARCHAR(45) NULL ,
  PRIMARY KEY (`IdEstudiante`) ,
  INDEX `FK_estudiantes_TipoDeDocumento` (`IdTipoDocumento` ASC) ,
  CONSTRAINT `FK_estudiantes_TipoDeDocumento`
    FOREIGN KEY (`IdTipoDocumento` )
    REFERENCES `mydb`.`TipoDocumento` (`IdTipoDocumento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Cargos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Cargos` (
  `IdCargo` INT NOT NULL AUTO_INCREMENT ,
  `Cargo` VARCHAR(45) NULL ,
  PRIMARY KEY (`IdCargo`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Empleados`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Empleados` (
  `IdEmpleado` INT NOT NULL AUTO_INCREMENT ,
  `Nombre` VARCHAR(45) NULL ,
  `Apellido` VARCHAR(45) NULL ,
  `IdCargo` INT NULL ,
  `Correo` VARCHAR(45) NULL ,
  `TelefonoFijo` VARCHAR(45) NULL ,
  `Celular` VARCHAR(45) NULL ,
  `Documento` VARCHAR(45) NULL ,
  `IdTipoDocumento` INT NULL ,
  PRIMARY KEY (`IdEmpleado`) ,
  INDEX `FK_Empleados_Cargos` (`IdCargo` ASC) ,
  CONSTRAINT `FK_Empleados_Cargos`
    FOREIGN KEY (`IdCargo` )
    REFERENCES `mydb`.`Cargos` (`IdCargo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Programas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Programas` (
  `IdPrograma` INT NOT NULL AUTO_INCREMENT ,
  `CodigoPrograma` VARCHAR(45) NULL ,
  `FechaInicio` DATETIME NULL ,
  `FechaFinal` DATETIME NULL ,
  PRIMARY KEY (`IdPrograma`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Bitacoras`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Bitacoras` (
  `IdBitacora` INT NOT NULL AUTO_INCREMENT ,
  `NombreJefeInmediato` VARCHAR(45) NULL ,
  `Empresa` VARCHAR(45) NULL ,
  `Fecha` DATETIME NULL ,
  `CorreoJefeInmediato` VARCHAR(45) NULL ,
  `NumeroGrupo` INT NULL ,
  `Observaciones` VARCHAR(45) NULL ,
  `TelefonoJefeInmediato` INT NULL ,
  `CodigoGrupo` INT NULL ,
  `IdEstudiante` INT NULL ,
  `DireccionEmpresa` VARCHAR(45) NULL ,
  `IdPrograma` INT NULL ,
  `NitEmpresa` INT NULL ,
  `TelefonoEmpresa` INT NULL ,
  PRIMARY KEY (`IdBitacora`) ,
  INDEX `FK_Bitacoras_Estudiantes` (`IdEstudiante` ASC) ,
  INDEX `FK_Bitacoras_Programas` (`IdPrograma` ASC) ,
  CONSTRAINT `FK_Bitacoras_Estudiantes`
    FOREIGN KEY (`IdEstudiante` )
    REFERENCES `mydb`.`Estudiantes` (`IdEstudiante` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_Bitacoras_Programas`
    FOREIGN KEY (`IdPrograma` )
    REFERENCES `mydb`.`Programas` (`IdPrograma` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Funciones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Funciones` (
  `IdFuncion` INT NOT NULL AUTO_INCREMENT ,
  `Descripcion` VARCHAR(255) NULL ,
  PRIMARY KEY (`IdFuncion`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ProgramasFunciones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`ProgramasFunciones` (
  `IdProgramaFuncion` INT NOT NULL AUTO_INCREMENT ,
  `IdPrograma` INT NULL ,
  `IdFuncion` INT NULL ,
  PRIMARY KEY (`IdProgramaFuncion`) ,
  INDEX `FK_ProgramaFunciones_Programas` (`IdPrograma` ASC) ,
  INDEX `FK_ProgramaFunciones_Funciones` (`IdFuncion` ASC) ,
  CONSTRAINT `FK_ProgramaFunciones_Programas`
    FOREIGN KEY (`IdPrograma` )
    REFERENCES `mydb`.`Programas` (`IdPrograma` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_ProgramaFunciones_Funciones`
    FOREIGN KEY (`IdFuncion` )
    REFERENCES `mydb`.`Funciones` (`IdFuncion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Opciones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Opciones` (
  `IdOpcion` INT NOT NULL AUTO_INCREMENT ,
  `Opcion` VARCHAR(45) NULL ,
  PRIMARY KEY (`IdOpcion`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`OpcionesFunciones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`OpcionesFunciones` (
  `idOpcionFuncion` INT NOT NULL AUTO_INCREMENT ,
  `IdOpcion` INT NULL ,
  `IdFuncion` INT NULL ,
  PRIMARY KEY (`idOpcionFuncion`) ,
  INDEX `FK_OpcionesFunciones_Funciones` (`IdFuncion` ASC) ,
  INDEX `FK_OpcionesFunciones_Opciones` (`IdOpcion` ASC) ,
  CONSTRAINT `FK_OpcionesFunciones_Funciones`
    FOREIGN KEY (`IdFuncion` )
    REFERENCES `mydb`.`Funciones` (`IdFuncion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_OpcionesFunciones_Opciones`
    FOREIGN KEY (`IdOpcion` )
    REFERENCES `mydb`.`Opciones` (`IdOpcion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Roles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Roles` (
  `IdRol` INT NOT NULL AUTO_INCREMENT ,
  `Rol` VARCHAR(45) NULL ,
  PRIMARY KEY (`IdRol`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Usuarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Usuarios` (
  `IdUsuario` INT NOT NULL AUTO_INCREMENT ,
  `IdEmpleado` INT NULL ,
  `IdEstudiante` INT NULL ,
  `Usuario` VARCHAR(45) NULL ,
  `Clave` VARCHAR(45) NULL ,
  `Estado` BIT NULL ,
  `Online` TINYINT(1)  NULL ,
  `IdRol` INT NULL ,
  PRIMARY KEY (`IdUsuario`) ,
  INDEX `FK_Usuarios_Empleados` (`IdEmpleado` ASC) ,
  INDEX `FK_Usuarios_Estudiantes` (`IdEstudiante` ASC) ,
  INDEX `FK_Usuarios_Roles` (`IdRol` ASC) ,
  CONSTRAINT `FK_Usuarios_Empleados`
    FOREIGN KEY (`IdEmpleado` )
    REFERENCES `mydb`.`Empleados` (`IdEmpleado` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_Usuarios_Estudiantes`
    FOREIGN KEY (`IdEstudiante` )
    REFERENCES `mydb`.`Estudiantes` (`IdEstudiante` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_Usuarios_Roles`
    FOREIGN KEY (`IdRol` )
    REFERENCES `mydb`.`Roles` (`IdRol` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`EstudiantesProgramas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`EstudiantesProgramas` (
  `IdEstudiantePrograma` INT NOT NULL AUTO_INCREMENT ,
  `IdPrograma` INT NULL ,
  `IdEstudiante` INT NULL ,
  PRIMARY KEY (`IdEstudiantePrograma`) ,
  INDEX `FK_EstudiantesProgramas_Estudiantes` (`IdEstudiante` ASC) ,
  INDEX `FK_EstudiantesProgramas_Programas` (`IdPrograma` ASC) ,
  CONSTRAINT `FK_EstudiantesProgramas_Estudiantes`
    FOREIGN KEY (`IdEstudiante` )
    REFERENCES `mydb`.`Estudiantes` (`IdEstudiante` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_EstudiantesProgramas_Programas`
    FOREIGN KEY (`IdPrograma` )
    REFERENCES `mydb`.`Programas` (`IdPrograma` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`BitacorasFunciones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`BitacorasFunciones` (
  `IdBitacoraFuncion` INT NOT NULL AUTO_INCREMENT ,
  `IdBitacora` INT NULL ,
  `IdFuncion` INT NULL ,
  `IdOpcion` INT NULL ,
  PRIMARY KEY (`IdBitacoraFuncion`) ,
  INDEX `FK_BitacorasFunciones_Bitacoras` (`IdBitacora` ASC) ,
  INDEX `FK_BitacorasFunciones_Funciones` (`IdFuncion` ASC) ,
  INDEX `FK_BitacorasFunciones_Opciones` (`IdOpcion` ASC) ,
  CONSTRAINT `FK_BitacorasFunciones_Bitacoras`
    FOREIGN KEY (`IdBitacora` )
    REFERENCES `mydb`.`Bitacoras` (`IdBitacora` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_BitacorasFunciones_Funciones`
    FOREIGN KEY (`IdFuncion` )
    REFERENCES `mydb`.`Funciones` (`IdFuncion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_BitacorasFunciones_Opciones`
    FOREIGN KEY (`IdOpcion` )
    REFERENCES `mydb`.`Opciones` (`IdOpcion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
