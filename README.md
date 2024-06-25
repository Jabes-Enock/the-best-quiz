
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
- [Technologies](#Technologies)
- [Installation](#Installation)


## Introduction

This project is a quiz where it is possible to manage technologies, categories, questions and the quiz itself.

[VIDEO HERE](https://drive.google.com/file/d/1RleI9w8fM8GqZ515dBWQ8PM0UNJXoM1z/view)

## Technologies

The quiz is separated by technologies or subjects, this way we can create any type of questions for the subjects we want to study.

<p align="center">
<img src="github/technologies.gif" />
</p>

## Categories

The ``categories`` table has a relationship with ``technologies`` table where one category belongs to one technology.

<p align="center">
<img src="github/categories.gif" />
</p>


<div id="Installation">

## :computer: Installation

  :warning: Before installing this project, make sure you have all [requirements](https://codeigniter.com/user_guide/intro/requirements.html).

### Step 1 - Download this project
  ##### Option :one: - Download Zip 
  ##### Option :two: - Cloning a repository - [how to do this](https://docs.github.com/en/repositories/creating-and-managing-repositories/cloning-a-repository). 

<br>

### Step 2 - Configuration

  #### 2.1 - Install the dependencies
  
  ````
    composer install
  ````

  #### 2.2 - Run the serve
  
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