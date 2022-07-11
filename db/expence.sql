-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2022 at 01:59 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expence`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Register_expence_sp` (IN `_id` INT, IN `_amount` FLOAT(11.2), IN `_type` VARCHAR(50) CHARSET utf8, IN `_description` TEXT CHARSET utf8, IN `_user_Id` VARCHAR(50) CHARSET utf8)  NO SQL
BEGIN

if EXISTS(SELECT * FROM expence WHERE expence.id=_id) THEN

UPDATE expence SET expence.amount=_amount, expence.type=_type, expence.description= _description WHERE expence.id= _id;

SELECT 'Updated' as Message;


ELSE


if(_type= 'expence') THEN

if((SELECT get_user_balance_fn(_user_Id) < _amount)) THEN

SELECT 'Deny' as Message;



ELSE
INSERT INTO expence(expence.id, expence.amount, expence.type, expence.description, expence.user_id) VALUES(_id,_amount, _type, _description, _user_id );


SELECT "Registered" as Message;

END IF;

ELSE
 INSERT INTO expence(expence.id, expence.amount, expence.type, expence.description, expence.user_id) VALUES(_id,_amount, _type, _description, _user_id );


SELECT "Registered" as Message;
END if;

END if;

END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `get_user_balance_fn` (`_userId` VARCHAR(200) CHARSET utf8) RETURNS FLOAT NO SQL
BEGIN

set @balance= 0.0;

set @income= (SELECT sum(expence.amount) from expence WHERE expence.type='income' AND expence.user_id= _userId );


set @expence= (SELECT sum(expence.amount) from expence WHERE expence.type='expence' AND expence.user_id= _userId );


set @balance= (ifnull(@income,0) - ifnull(@expence,0));

RETURN @balance;



END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `expence`
--

CREATE TABLE `expence` (
  `id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expence`
--

INSERT INTO `expence` (`id`, `amount`, `type`, `description`, `user_id`, `date`) VALUES
(27, -10, 'income', 'fdfg', 'user2022', '2022-03-02 19:20:04'),
(55, -10, 'expence', 'fdfg', 'user2022', '2022-03-02 10:17:11'),
(56, 44, 'income', 'j', 'user2022', '2022-03-02 19:19:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expence`
--
ALTER TABLE `expence`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expence`
--
ALTER TABLE `expence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
