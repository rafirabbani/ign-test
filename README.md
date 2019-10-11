# ign-test

# index.php

file ini berisi perintah untuk mengambil API dan menyimpannya ke database
perintah untuk mengambil api dijalankan oleh fungsi "callAPI()"
perintah untuk emnyimpan ditabase diajalankan menggunakan "foreach loop"
untuk menghindari adanya duplikasi sebelum data dari api dimasukkan, terdapat fungsi "checkData()"
jika "checkData()" memberikan nilai "true", maka "foreach loop" tidak akan dijalnkan
jika "checkData()" memberikan nilai "false", maka "foreach loop" akan dijalankan

# sql-connection.php
file ini berisi informasi tentang database dan kredensial lainnya

# migrate.php
file ini berisi fungsi untuk membuat table baru pada database yg digunakan di 
file "sql-connection.php"
