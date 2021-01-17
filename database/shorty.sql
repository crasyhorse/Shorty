CREATE TABLE abbreviations ( 
  id INTEGER PRIMARY KEY, 
  short VARCHAR(20) NOT NULL, 
  long TEXT NOT NULL, 
  UNIQUE (short, long) 
);

INSERT INTO abbreviations VALUES(1, 'Abb', 'Abbildung'); 
INSERT INTO abbreviations VALUES(2, 'abs', 'absolut'); 
INSERT INTO abbreviations VALUES(3, 'AC', 'axiom of choice'); 
INSERT INTO abbreviations VALUES(4, 'adj', 'adjungiert'); 
INSERT INTO abbreviations VALUES(5, 'adj', 'adjunkt'); 
INSERT INTO abbreviations VALUES(6, 'AGM', 'arithmetisch-geometrisches Mittel'); 