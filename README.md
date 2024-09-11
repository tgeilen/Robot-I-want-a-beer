# Robot, I want a beer!
This repository serves as documentation for the "Beer Robot" project in the TUM advanced practical course "Sustainable Process Automation: Humans, Software and the Mediator Pattern".

In the following paragraphs the idea, development artifacts, pre-requirements and the implemented process will be discussed.


# Idea

## Situation before this project
As its name suggests, the Cocktail Robot was previously only able to serve cocktails. However, as people may dislike cocktails or alcoholic drinks in general, the robot lacks the functionality to serve drinks to them. Therefore, adding functionality to let the robot serve drinks from closed, crowned cap bottles widely increases its user base.

## Goal of this project
After successfully implementing this project, the cocktail robot can find a grab crown cap bottles, open them, and pour their content into glasses and serve them to a customer. Additionally, the robot will do this in a way, where also foaming baverages (i.e. a beer) can be served with a stable foam crown.

## Process Design
To achieve the above stated project goal, the idea of pouring a drink from a closed crown cap bottle is divided in multiple sub-processes.

### 1. Ordering a drink
At the very beginning of the process stands the user. Over a dedicated website the user is able to place the order and give additional instructions on it. To cover additional use cases the user can state whether the bottle has been open already and also decide if one or two drinks should be made.

<div style="text-align:center"><img src="orderingWebpage.png" /></div>

The page is fully responsive and can also accessed via a mobile device. To make the ordering process as simple as possible, the link to the webpage can be opened via a QR code placed near the robot.

The webpage for an ordering a drink is avaible under: https://lehre.bpm.in.tum.de/~go56jiw/orderBeer/
Note: In order for the robot to execute the order, the CPEE process needs be started prior to ordering.


<div style="text-align:center"><img src="qrCodeWebpage.png" /></div>

The code of the webpage and the PHP files forwarding the user input to the CPEE process engine can be found in this repository in the code folder. 

### 2. Getting the closed bottle
The closed bottle needs to be placed in a predetermined position by a human operator. On process execution, the robot grabs the closed bottle from said position and places it on different position to open it.

### 3. Opening the clossed bottle
In this phase, a special 3D-printed adapter is utilized to hold the bottle opener. This adapter is easy for the robot to hold and push down on the closed bottle to remove the crown cap. 
As the crown can get stuck within the opener, another 3D-printed device might be needed to remove it from the opener.

<div style="text-align:center"><img src="bottleOpener.png" /></div>

The CAD construction files for the 3D-printed bottle opener parts can be access via the following link: https://cad.onshape.com/documents/6a5412c4e68d0fce2ab7888f/w/e2a39a63512e6414095e9b9c/e/d7c2ca389113a15bfc2ea8c5?renderMode=0&uiState=66e17026db572617a75261e5


### 4. Pouring the drink
The carbonation of bevarages can cause them to heavily foam when pouring straight down into a glass. To ensure a steady flow without major foam producation the glass is placed on a special 3D-printed slope in a 45° angle first.

<div style="text-align:center"><img src="glassHolder.png" /></div>


After filling the most of the glass on the holding device, the robot returns glass to its inital position. Subsequently, the robot grabs the opened bottle again and pours a small amount into the glass to create some foam right before serving.

As one bottle holds enough liquid the serve two drinks at a time, the customer can also order two drinks at once. In this case both glasses are filled on the sloped successively and then "foamed up" in the same movement afterwards.

The CAD construction files for the 3D-printed glass holder parts can be access via the following link: https://cad.onshape.com/documents/83273c00850ef1c1cad62c91/w/5cc8dd61ae3197134bb7c1b9/e/b5ddfee44e0f972412c45bbc?renderMode=0&uiState=66e173128ab39f00f015a33b


### 5. Serving the drink 
In the current process implementation, the user placed one or two glasses in predetermined positions. The robot the takes the glasses from there, moves them on the slope and returns them to the inital positions to "foam up" and serve the drinks.



