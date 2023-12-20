DROP DATABASE IF EXISTS ibex35;
CREATE DATABASE ibex35;
USE ibex35;
CREATE TABLE valores
(
    alias     varchar(4) PRIMARY KEY,
    nombre    varchar(50),
    anho      int,
    valor     decimal(5, 2),
    compradas int
);

INSERT INTO valores(alias, nombre, anho, valor, compradas)
VALUES ("ANA", "Acciona", 2015, 1.12, 0),
       ("ANE", "Acciona Energía", 2022, 0.36, 0),
       ("ACX", "Acerinox", 2015, 0.49, 0),
       ("ACS", "ACS", 1998, 2.03, 0),
       ("AENA", "Aena", 2015, 3.51, 0),
       ("AMS", "Amadeus IT Group", 2011, 5.19, 0),
       ("MTS", "ArcelorMittal", 2009, 0.76, 0),
       ("SAB", "Banco Sabadell", 2004, 1.41, 0),
       ("SAN", "Banco Santander", 1992, 12.01, 0),
       ("BKT", "Bankinter", 1992, 1.15, 0),
       ("BBVA", "BBVA", 1992, 9.48, 0),
       ("CABK", "CaixaBank", 2009, 4.93, 0),
       ("CLNX", "Cellnex Telecom", 2016, 4.19, 0),
       ("ENG", "Enagás", 2003, 0.89, 0),
       ("ELE", "Endesa", 1992, 1.61, 0),
       ("FER", "Ferrovial", 1999, 4.43, 0),
       ("FDR", "Fluidra", 2021, 0.55, 0),
       ("GRF", "Grifols", 2008, 0.97, 0),
       ("IAG", "IAG", 2011, 1.76, 0),
       ("IBE", "Iberdrola", 1992, 14.27, 0),
       ("ITX", "Inditex", 2001, 13.03, 0),
       ("IDR", "Indra Sistemas", 1999, 0.50, 0),
       ("COL", "Inmobiliaria Colonial", 2007, 0.49, 0),
       ("LOG", "Logista", 2022, 0.53, 0),
       ("MAP", "Mapfre", 1992, 0.78, 0),
       ("MEL", "Meliá Hotels", 2016, 0.20, 0),
       ("MRL", "Merlin Properties", 2015, 0.79, 0),
       ("NTGY", "Naturgy", 2018, 1.11, 0),
       ("RED", "Red Eléctrica Corporación", 2000, 1.70, 0),
       ("REP", "Repsol", 1992, 3.78, 0),
       ("ROVI", "Laboratorios Rovi", 2021, 0.35, 0),
       ("SCYR", "Sacyr", 2022, 0.40, 0),
       ("SLR", "Solaria Energía y Medio Ambiente", 2020, 0.30, 0),
       ("TEF", "Telefónica", 1992, 4.49, 0),
       ("UNI", "Unicaja Banco", 2002, 0.45, 0);