# -*- coding: utf-8 -*-
"""
Created on Sun Oct  3 15:57:15 2021

@author: Adel
"""

import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="usuario324",
  password="123456",
  database="bdadel"
)

mycursor = mydb.cursor()

mycursor.execute("INSERT INTO usuario values('10101016','Lil56','123456')")
mycursor.execute( "INSERT INTO persona VALUES('10101016','Lilian Lima Lozano', '1978-05-25', '01')" )
mycursor.execute("INSERT INTO estudiante VALUES('10101016','530092850','MAT')")

mycursor.execute( "INSERT INTO usuario values('10101017','car25','123456')" )
mycursor.execute( "INSERT INTO persona VALUES('10101017','Carlos Condori Quispe', '1978-05-25', '01')" )
mycursor.execute("INSERT INTO estudiante VALUES('10101017','409099085','FIS')")

mycursor.execute("SELECT estudiante.ci, usuario.Usuario, estudiante.matricula, persona.nombre FROM usuario, estudiante, persona WHERE estudiante.ci=usuario.ci and usuario.ci=persona.ci;")
for estudiante in mycursor.fetchall() :
    print(estudiante)

mydb.commit()

