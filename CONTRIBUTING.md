*Welcome, and thank you for contributing to this project. Please take your time to study this document carefully before making any changes to the codebase, to ensure you're on the same page with the rest of the team and we can all collaborate seamlessly.*   

# Workflow
It is very important to follow the workflow defined here when pushing your changes to the repository to avoid messing up project files. This project's workflow is based on the [GitHub Flow](https://guides.github.com/introduction/flow/). More indepth git flow article [here](https://nvie.com/posts/a-successful-git-branching-model/).     
We will have smaller subteams based on the project requirements. We will also be creating branches based on these subteams to allow us work on various aspects of the project simultaneously.

## Branch Structure   
__'*develop*' - The Integration branch.__ This is the default branch. This is where features from the subteams are brought together. Subteams, submit your pull requests here, once your subteam branch is ready for integration. We will bring it all together in the integration phase.     
__'*master*' - The deployment branch.__ The code on this branch goes live to our hosting server and must be kept in pristine condition. When the integration (develop) branch reaches a milestone, the deployment (master) branch is updated via pull request.      
__Hotfix branches.__ If we find a bug in after deployment/integration and do not want to interrupt the works others are doing on newer features, a hotfix branch may be created off of *master* or *develop* as appropriate. Hotfix branch names are prefixed with "hf__". On completion, this branch is merged with *master*, and also with *develop* so the fixes are reflected in all future deployments.     
__Topic branches.__ This is usually Frontend & Backend but we may use a different structure depending on the project. When a milestone is reached, a pull request is made to the *develop* branch. Each subteam will have it's own topic branch.      
__Working branches.__ This is where initial work gets done. Any new features are broken down into tasks for each team member who does their work in a working branch that will be created for each person. The name of a working branch will correspond with the Slack display name of the person assigned to this task. Working branch names should begin with an "@" and all spaces should be replaced with a dash. Example: @Feranmi-Akinlade. When you finish working on your task, create a pull request to the appropriate topic branch.   

### Staying Updated
When working with teams on the same codebase, sometimes others make changes that affect your work. While great care has been taken to create a modular team workflow to keep this to a minimum, merge conflicts are inevitable. It would _suck_ to finish working on a task, only to find that the codebase has evolved and you need to rework everything to conform to the new changes. This is managed in two ways.       
__*First*__, discuss changes with the team beforehand. This is to ensure that you do not make changes that are in conflict with the work of others. GitHub has a handy feature for this - _[issues](https://help.github.com/en/articles/about-issues)_. [Create an issue](https://help.github.com/en/articles/creating-an-issue) and [label it](https://help.github.com/en/articles/applying-labels-to-issues-and-pull-requests). When you create an issue, it is automatically tracked on the team's [project board](https://help.github.com/en/articles/about-project-boards). Keep the issue open as long as work continues on the feature. All discussions regarding that feature are done under this issue. Your pull request is linked with the corresponding issue when work is completed, by adding "*closes #{number}*" to the pull request description on GitHub. Replace {number} with the appropriate issue number e.g _closes #5_.       
__*Second*__, each team member needs to make sure that at every given time, their working directory is up-to-date with the latest changes from the remote origin (online). **You can do this easily by going into GitHub Desktop app and clicking `pull origin`. If you are using the command line, the following steps should help. `cd` into your project folder before running these commands.       

Make sure you have the _origin_ remote set up.    
  <pre>git remote add origin git://github.com/team-wildcards/trip.ng.git</pre>    
You will be pushing your work to 'origin' to back it up online.       
__*The following steps must be run periodically to keep your work up-to-date. You can run these commands as often as every hour. You want to fetch any new changes as soon as possible.*__       
Be sure to [stash](https://dev.to/neshaz/how-to-git-stash-your-work-the-correct-way-cna) 
or commit all local changes first.  

1. Switch to your subteam/topic branch        
    <pre>git checkout frontend</pre>          
2. Get all remote (online) changes from 'origin' into your local computer.        
    <pre>git fetch origin</pre>      
3. Merge changes fecthed with your local subteam branch. (The local subteam branch must be the currently checked-out branch. See step 1 above.)        
    <pre>git merge origin/frontend</pre>      
4. Next, switch to your working branch.        
    <pre>git checkout @your-slack-username</pre>      
5. Merge the changes on the newly merged subteam/topic branch, into your working branch. You may run 'git branch' to confirm which branch you're about to merge into.        
    <pre>git merge frontend</pre>
    *You may encounter merge conflicts here.
    [Resolve them](https://help.github.com/en/articles/resolving-a-merge-conflict-using-the-command-line),
    then come back and complete the merge. If you merge often enough, any conflicts would be trivial and very few.*       
6. Finally, push your newly merged working branch to the remote github server for back up.        
    <pre>git push origin @your-slack-user-name</pre>  
7. Once you're done with your task and you've pushed to github, head over to the github website and create a [pull request](https://help.github.com/en/articles/about-pull-requests) from your branch (the `compare` branch), to your subteam branch (the `base` branch).		    

# Code Structrure & Readability
## FRONT-END
This section defines the guidelines and methodologies to be used for the front-end of this project. This applies to all HTML, CSS, and JavaScript code.

### CSS - Introducing BEM.
CSS is great, but it can get messy and difficult to maintain styles as the css file grows larger. It is therefore necessary for the team to adhere to strict guidelines when working on our stylesheets to keep the code clean and maintainable.
**_Do not use abbreviations when naming elements. This introduces confusion as other team members may struggle to figure out what it represents. For example, use `.button` instead of `.btn`. It may be longer to type, but it makes your code more readable and saves the team some headache. Be very generous with comments._**

#### Do Not Use Inline Styles. Ever.
Inline styles have just about the highest specificity an so cannot be overriden from within the stylesheet. They also make debugging style conflicts more difficult. Inline styles do not lend themselves to the [DRY principle](https://en.wikipedia.org/wiki/Don%27t_repeat_yourself).

#### Modularity
The complexity of a stylesheet is directly proportional to the length of the file. 
It is therefore necessary to break styles into smaller files. The following rules apply when creating stylesheets
for this project.

##### A separate stylesheet for each page.

##### A separate stylesheet for each reusable component.
An example of a reusable component is the footer section which is present on every page. This 
also includes components whose contents might change but need to appear consistently throughout the web app,
Examples include buttons and headings. All instances these elements share the same styles.
Styles for these sections should not be repeated in each page's stylesheet, rather a separate stylesheet should be 
created for such sections and added to every page that needs it using the `@import` CSS rule.

#### Selectors - The BEM Methodology
The guidelines in this section are based heavily on the popular CSS methodology called BEM. [Read about BEM here](https://css-tricks.com/bem-101/).
BEM stands for Block, Element, Modifier and describes a standard for consistently naming CSS selectors that makes
both HTML and CSS easier to read, understand, and hence to maintain.

##### Rule 1 - Stick to class selectors
Only use css class selectors. Avoid using id or decendant selectors. This helps prevent problems relating to specifity. [Read about specificity here](https://www.w3schools.com/css/css_specificity.asp).

##### Rule 2 - Each section of a page defines a new block.
Example
```css
  .landing-section {
    /*your styles here*/
  }
```

##### Rule 3 - Mark UI elements with double underscore
Identify each UI element within a block with the double underscore BEM naming convention. This consists of the containers className followed by two underscores then the elements className.
Example
```css
  .landing-section__action-button {
    /*your styles here*/
  }
```
Some elements may also constitute their own block. This is common with reusable components.
In this case we separate composition from layout with two classes. One for the element, and one for the block it renders.
For example, a button which contains an icon may be defined as follows...
```html
  <button class="button is-with-icon login-form__button">
    <img src="debit-card.png" class="button__icon">
    Donate Now
  </button>
```

Here the block class is *.button*, which defines the structure (composition) of the button such as its color, box-shadow etc. This should be defined in the button component CSS file.
The element class is *.login-form__button which defines the position (layout) of the button within its parent block (which is a login form in this example). This should be defined in the current page's CSS file or that of its parent component if used within a larger reusable component, such as a footer section.
And lastly, *.is-with-icon* is a state class or modifier (see next rule) which specifies additional styles that only applies to buttons that contain icons. This must be defined in the button component CSS file.

##### Rule 4 - Define modifiers with additional CSS classes.
Modifiers define additional styles for different states of a UI element.
A button for example might have a disabled state when it is unclickable, perhaps because the user needs to enter
some information before submitting a form.
We divert a bit from the BEM recommendation here by thinking in terms of *state* rather than *modifier*. 
Element states should be defined using additional CSS classes prefixed with *'is-'*

For example, the element
```html
  <button class="login-form__button is-disabled"></button>
```
should have default styles defined as 
```css
  .login-form__button {
    /*your styles here*/
  }
```
Additional styles to be applied when it is disabled will then be defined as
```css
  .login-form__button.is-disabled {
    /*your styles here*/
  }
```
The use of state classes in place of the BEM double dash modifier convention allows easy toggling of these
states from JavaScript using the 
```javascript
  HTMLElement.classList.add('is.disabled');
```
method. This also offers a higher specifity which assures that the state changes will override the default styles.  
[Read about specifity](https://www.w3schools.com/css/css_specificity.asp). You may feel that this makes the selectors longer to type, but rest assured the benefits are much worth it! It's makes everything clear and easy to understand, which is paramount when working with others.

##### Rule 5 - Decendant selectors - A special case.
Sometimes, it may be necessary to change an elements styles based on the state of it's parent *block*.
In this case, the decendant selector is used.
**Example**
We might want to highlight the action button on a card when the user clicks on the card.
```css
  .card.is-focused .card__button {
    background-color: var(--accent-color); /*Using CSS vars. See next section.*/
  }
```
This also offers a higher specificity which ensures that the state changes will override any defaults.

#### Reusable Values With CSS Variables (Custom Properties) - Managing Themes and Color Schemes
Think about text and colors on some of your favorite websites. You'll notice that they're usually the same on all the different pages throughout the site. It's not very DRY to repeat this same color and font values throughout the many different stylesheets. We solve this with a single globals.css files where all reusable values, and global defaults such as fonts, are defined. This file must be imported by all other **_page_** CSS files, to apply global default styles, and also to use predefined color and other reusable values. Reusable values are defined in this file through [CSS Variables](https://www.w3schools.com/css/css3_variables.asp). More on CSS Vars at [FreeCodeCamp](https://www.freecodecamp.org/news/everything-you-need-to-know-about-css-variables-c74d922ea855/). CSS vars greatly improve code DRYness. This makes it easier to manage color values and themes from a central place. Globals are only imported in _page_ css files and not _components_ because their values are defined on the `:root` element and are thus applicable throughout the page. Therefore importing in each component file is redundant. Here is a snippet from _globals.css_.
```css
  :root {
    --primary-color: #2D0051;
    --accent-color: #FFE500;
    width: 100vw;
    overflow-x: hidden;
  }
```

### HTML
**_Do not use abbreviations when naming elements. This introduces confusion as other team members may struggle to figure out what it represents. For example, use `.button` instead of `.btn`. Be very generous with comments._**

#### Semantics Please.
HTML5 introduced semantic tags such as `<section>` and `<footer>` which implicitly convey meaning about their purpose on the page. These tags improve accesibility by making it easier for screen readers to interprete the information on a page for visually impaired users, and also aiding Search Engine Optimization. Where relevant, use these tags instead of the generic containers like `<div>`.

##### Rule 1 - Headings
All headings must be marked with relevant tags from `h1` to `h6` depending to the page heirachy. Do not use CSS to style a `<p>` or `<span>` to appear as an heading.

##### Rule 2 - Button vs. Anchor Link
The anchor tag in HTML has a specific function - linking a user to another page. Buttons on the other hand are used to provide additional functionality to the user. Therefore, if a button takes the user to a new page, only then must the anchor tag be used. In all other cases, the button tag must be used.

##### Rule 3 - Logical sections
`<header>`, `<section>`, `<aside>`, `<footer>`. These are semantic HTML5 tags used to mark separate sections of a page. Do NOT use the generic `<div>` tag where any of these would be more appropriate.

### JavaScript
**_Do not use abbreviations when naming elements. This introduces confusion as other team members may struggle to figure out what it represents. For example, use `let navButton` instead of `let navBtn`. It may be longer to type, but it makes your code more readable and saves the team headache. Be very generous with comments._**

Write clean code. Make things modular. Keep external libraries to minimum to avoid making the app bloated.
Further guidelines may be included as the project progresses.


## BACKEND
Kindly take note of the following when working on the backend.   

### Creating Endpoints / Routes.
The functions you write we'll be exposed to the frontend via specific URL endpoints. Use `route.php` to register these endpoints whenyou create a new one. See the sample below.

```php
<?php
//Go to route.php file to add your file e.g to add dashboard.php 
//go to route and locate the switch statement to add a case for your new addition
//check the code below
switch ( $url_array[$indexOfIndexPHP+1]) {
	case 'dashboard':
	require_once "dashboard.php";
	break;
	default:
	echo "404";
}
```

### Using The Simple Query Helper
To make database queries easier, **and safer**, an helper module has been created in `Database.php`. _All database operations **must** be made using this helper module._ Errors in database operations can be very costly, so *please* adhere to this rule. The module may be extended to provide more functionality.

```php
<?php
//Require the database.php file.
//Create a new object...
//...and use the query() method for non-selecting SQL operations (Insert, Delete, Drop, etc).
//For selecting use the select() method. 
//Remember to call the close() method in either case.

require 'Database.php';
$db = new Database();

//Selecting from db
$result = $db->select("SELECT * FROM users WHERE time=1455667788;");
if ($result == 0) {
	echo "No Records";
}
else {
	var_dump($result);
	//Returns the multi array containing array of each row.
}
$db->close();

//Any other query apart from select
if ( $db -> query(
				"INSERT INTO users (firstname, lastname, email, password, phone, time)
				VALUES ('John3', 'Doe3', 'john@example.com', 'password', '0906844632', 1455667788);"
			)
		) {
	echo "Worked";
}
else {
	echo "Not Working";
}
$db->close();
```

### Format for Returning Data
We are using JSON to return data to the frontend. Check the example below.

```json
{
	"error": 0,
	"successMessage": "User added ...",
	"action": " register"
}

//on error
{
	"error": 1,
	"errorMessage": "the error message",
	"action": "register"
}
```
### Adding Dashboard function
 adding new function relating to dashboard can now/should be done in the dashboard.php  class as a method if  i want to commit a code that get all Expense i will declare a public method in the dashboard.php as follows:
...
```php

   public function getAllExpense(id =NULL){
//do some operation here
   } 

```
...
   and also if you need to get maybe an id then the parameter of your function will be the id .for example a link like this localhost/backend/route.php/dashboard/getExpense/45 will call the getExpense funtion in the class dashboard with 45 as the parameter the code will look like:
...
   ```php
 public function getExpense($id){//do some operation here

  getExpenseById($id);//$Id will equal to anything in the url last section incase of the above 45
   } 
   ```
  ...
