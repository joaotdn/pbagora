<?php
/**
 * Created by PhpStorm.
 * User: joao
 * Date: 21/10/15
 * Time: 12:34
 */
?>

<!doctype html>
<html class="no-js" lang="pt-br" ng-app="PBAapp">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PB Agora</title>

    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css" />

    <script src="bower_components/modernizr/modernizr.js"></script>
</head>
<body>
<div id="wrapper" class="small-12 left">

    <div id="menu-offcanvas">
        <header class="small-12 left">
            <h4 class="text-up primary no-margin lh-1 small-12 left">
                <span class="left"><strong>PB</strong>Agora</span>
                <span class="right icon-close primary close-offcanvas"></span>
            </h4>
        </header>

        <form id="mobile-search" method="get">
            <input type="text" name="s" id="s" placeholder="Buscar" class="small-12 left"/>
            <span class="icon-search primary abs"></span>
        </form>

        <nav id="mo-menu" class="small-12 left"></nav>
    </div>
    <a href="#" class="close-offcanvas"></a>

    <header id="header" class="small-12">
        <div class="row rel">

            <div class="d-table-cell small-12">
                <div class="small-12 left">

                    <figure class="small-12 large-2 small-text-center large-text-left columns logo">
                        <a href="#" class="left d-iblock icon-menu open-offcanvas"></a>

                        <a href="#" title="Página principal" class="less-opacity">
                            <img src="images/logo.png" alt=""/>
                        </a>
                    </figure>

                    <nav id="main-menu" class="small-8 columns end show-for-large-up" role="navigation">
                        <ul class="inline-list no-margin">
                            <li><a href="#">Paraíba</a></li>
                            <li><a href="#">Política</a></li>
                            <li><a href="#">Policial</a></li>
                            <li><a href="#">Brasil</a></li>
                            <li><a href="#">Mundo</a></li>
                            <li><a href="#">Esportes</a></li>
                            <li><a href="#">Entretenimento</a></li>
                            <li><a href="#">Vida & Lazer</a></li>
                        </ul>
                    </nav>

                </div>

                <div id="wheather" class="abs small-1 small-pull-1">
                    <div class="d-table-cell small-12">
                        <span class="icon-cloud left"></span>
                      <span class="top-date left">
                        <strong>qui</strong><strong>27</strong><strong>24</strong>
                      </span>
                    </div>
                </div>

                <a href="#" id="pba-search" class="small-1 abs">
                  <span class="d-table-cell small-12 text-center">
                      <span href="#" class="d-iblock icon-search"></span>
                      <span href="#" class="d-iblock icon-close hidden"></span>
                  </span>
                </a>
                <form novalidate="novalidate" class="small-9 small-push-2 column abs search-portal" ng-controller="SearchController">
                    <div class="small-12 columns">
                        <input type="text" id="input-portal" placeholder="O que você procura?" ng-model="query.term" ng-keyup="search(query)">
                    </div>
                </form>
            </div>
        </div>
    </header>
