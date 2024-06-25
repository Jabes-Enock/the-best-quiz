
<p align="center">
<img src="github/cover.jpg" />
</p>
</br>

![Badge em Desenvolvimento](http://img.shields.io/static/v1?label=STATUS&message=DEVELOPING&color=GREEN&style=for-the-badge)

## :bookmark_tabs:Summary

- [Introduction](#introduction)

- [Features and some gif's ](#features-and-demo)
    - [Technologies ](#technologies)
    - [Categories ](#categories)
    - [Questions ](#questions)
    - [Quiz ](#quiz)
    - [Dashboard ](#dashboard)
- [Tools](#tools)
- [Installation](#Installation)


## Introduction

This project is a quiz where it is possible to manage technologies, categories, questions and the quiz itself.

[VIDEO HERE](https://drive.google.com/file/d/1RleI9w8fM8GqZ515dBWQ8PM0UNJXoM1z/view)

<br><br>

## Technologies

The quiz is separated by technologies or subjects, this way we can create any type of questions for the subjects we want to study.

<p align="center">
<img src="github/technologies.gif" />
</p>

#### Information


| URL  |  METHOD | JSON Body | DETAILS 
|--- |--- |--- |--- 
| {YOUR_HOST}/technologies | GET | -
| {YOUR_HOST}/technologies | POST | technology  \| is_visible | All fields are required \| rules in Tech/Models/TechModel.php
| {YOUR_HOST}/technologies/{technology_id} | GET | - | 
| {YOUR_HOST}/technologies/{technology_id} | PUT | technology  \| is_visible | Update one or all fields 
| {YOUR_HOST}/technologies/{technology_id} | DELETE | - | 
 
<br><br>

## Categories

<p align="center">
<img src="github/categories.gif" />
</p>

#### Information

The ``categories`` table has a relationship with ``technologies`` table where one category belongs to one technology.

````
  //Categories/Database/Migrations/2024-05-03-211527_Categories.php

 '$this->forge
        ->addForeignKey(
            "technology_id",
            "technologies",
            "id",
            "CASCADE",
            "CASCADE",
            "fk_categories_technologies"
        );
````

| URL  |  METHOD | JSON Body | DETAILS 
|--- |--- |--- |--- 
| {YOUR_HOST}/categories | GET | -
| {YOUR_HOST}/categories | POST | category \| technology_id  \| is_visible | All fields are required \| rules in Categories/Models/CategoriesModel.php
| {YOUR_HOST}/categories/{category_id} | GET | - | 
| {YOUR_HOST}/categories/{category_id} | PUT | category \| technology_id  \| is_visible | Update one or all fields 
| {YOUR_HOST}/categories/{category_id} | DELETE | - | 

<br><br>

## Questions

<p align="center">
<img src="github/questions.gif" />
</p>

#### Information

The ``questions`` table has a relationship with ``categories`` table where one question belongs to one category.

````
  //Questions/Database/Migrations/2024-05-03-214606_CreateQuestionsTableMigration.php
  ...
 '$this->forge
        ->addForeignKey(
             "category_id",
            "categories",
            "id",
            "CASCADE",
            "CASCADE",
            "fk_questions_categories",
        );
  ...
````

| URL  |  METHOD | JSON Body | DETAILS 
|--- |--- |--- |--- 
| {YOUR_HOST}/questions | GET | -
| {YOUR_HOST}/questions | POST | question \| correct  \| option_a  \| option_b  \| option_c  \| option_d  \| category_id | All fields are required \| rules in Questions/Models/questionsModel.php
| {YOUR_HOST}/questions/search/{param} | GET | - | 
| {YOUR_HOST}/questions/{question_id} | GET | - | 
| {YOUR_HOST}/questions/{question_id} | PUT | question \| correct  \| option_a  \| option_b  \| option_c  \| option_d  \| category_id | Update one or all fields 
| {YOUR_HOST}/questions/{question_id} | DELETE | - | 

<br><br>

## Quiz

here is the core of application

<p align="center">
<img src="github/quiz.gif" />
</p>


| URL  |  METHOD | JSON Body | DETAILS 
|--- |--- |--- |--- 
| {YOUR_HOST}/quiz/technologies | GET | -
| {YOUR_HOST}/quiz/categories-by-technology/{technology_id}| GET | -
| {YOUR_HOST}/quiz/questions-by-category/{category_id}?page={page}| GET | -
| {YOUR_HOST}/quiz/check-answer | POST | questions_id \| answer | all fields are required \| see Quiz/Controllers/Api/Quiz.php > checkAnswer()

<br><br>

## Dashboard

<p align="center">
<img src="github/dashboard.gif" />
</p>


| URL  |  METHOD | JSON Body | DETAILS 
|--- |--- |--- |--- 
| {YOUR_HOST}/dashboard/resume-resources | GET | -
| {YOUR_HOST}/dashboard/categories-related-questions| GET | -

<br><br>

## Tools

- [Codeigniter](https://codeigniter.com/)
CodeIgniter is a powerful PHP framework with a very small footprint, built for developers who need a simple and elegant toolkit to create full-featured web applications.
<br>

- [Tailwindcss](https://tailwindcss.com/)
A utility-first CSS framework packed with classes like flex, pt-4, text-center and rotate-90 that can be composed to build any design, directly in your markup.
<br>

- [Flowbite](https://flowbite.com/dochttps://flowbite.com/docs/getting-started/introduction/)
        Get started with the most popular open-source library of interactive UI components built with the utility classes from Tailwind CSS
        <br>

- [Pictogrammer Icons](https://pictogrammers.com/library/mdi/)
Open-source iconography for designers and developers
<br>

- [jQuery](https://jquery.com/)
jQuery is a fast, small, and feature-rich JavaScript library.
<br>

- [Axios](https://axios-http.com/)
Axios is a simple promise based HTTP client for the browser and node.js. Axios provides a simple to use library in a small package with a very extensible interface.
<br>

- [ChartJS](https://www.chartjs.org/)
Simple yet flexible JavaScript charting library for the modern web
<br>

- [Sweet Alert 2](https://sweetalert2.github.io/)
A beautiful, responsive, customizable, accessible (wai-aria) replacement for javascript's popup boxes
<br>

- [Poppins - Google Fonts](https://fonts.google.com/specimen/Poppins)

<br>

- Dark Theme and responsive

<br>

<div id="Installation">

## :computer: Installation

  :warning: Before installing this project, make sure you have all [requirements](https://codeigniter.com/user_guide/intro/requirements.html).

### Step 1 - Download this project
  ##### Option :one: - Download Zip 
  ##### Option :two: - Cloning a repository - [how to do this](https://docs.github.com/en/repositories/creating-and-managing-repositories/cloning-a-repository). 

<br>

### Step 2 - Configuration

  #### 1 - ``.env`` File

  Copy the ``env`` file and rename it to `.env`

   #### 2 - Setup variables
   Search for these variables and edit your custom values.
   ````
    database.default.hostname = YOUR_HOST
    database.default.database = YOUR_DATABASE_NAME
    database.default.username = YOUR_USERNAME
    database.default.password = YOUR_pASSWORD
  ````

  #### 3 - Install the dependencies
  
  ````
    composer install
  ````

  #### 4 - Run migrations
  
  ````
    php spark migrate --all
  ````

  or you can access the routes ``YOUR_HOST/setup`` after execute the command below

  #### 5 - Run the serve
  
  ````
    php spark serve
  ````

</div>
<br><br>

## Run Tailwindcss
 :warning: You must have [NodeJs](https://nodejs.org/en)

Run the command below to activate tailwindcss


    //change the path according to your project
    npx tailwindcss -i ./tailwind/input.css -o ./public/assets/css/tailwind.css --watch

</br></br>


Made with :heart: by Jabes Enock