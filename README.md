# PHP MySQl CRUD
\
PHP Version: v8.1.2 \
Need composer for downloading packages and \
"composer update"
\
\
HISTORY OF CHANGES

- First commit with the project done, also using bootstrap for front end (https://getbootstrap.com/)
- Changed the primary key from the database to be auto_increment
- Added support to pdf report using dompdf 1.2.2 (https://github.com/dompdf/dompdf)
- Suport for a picture added to the database
- The database was split into codfun and cargos. Support for selecting the funcionário cargo and pulling associated info from cargos added.
- Some changes made to relatorio, config and funcionality to view, edit and delete jobs added.
- Refinements to novo-cadastro.php and gerencia-cargos.php. Can't populate codfun without any cargo on cargos table.
- Some checks added about the database and data inside it.
- Possibility to delete cargo from cargos now, related warnings.
- Some explanation and a new default page added (adding to the "Bem vindo(a)." from Inicio. 
\
\
Consider supporting: \
symfony \
  polyfill-mbstring \
    https://symfony.com/sponsor \
    https://github.com/sponsors/fabpot \
    https://tidelift.com/funding/github/packagist/symfony/symfony \
    https://github.com/dompdf/dompdf

