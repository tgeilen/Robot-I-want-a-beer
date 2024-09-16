# Robot, I Want a Beer!
This repository serves as documentation for the "Beer Robot" project in the TUM advanced practical course "Sustainable Process Automation: Humans, Software, and the Mediator Pattern".

In the following paragraphs, the idea, development artifacts, prerequisites, and the implemented process will be discussed.

## Table of Contents
- [Robot, I Want a Beer!](#robot-i-want-a-beer)
  - [Idea](#idea)
    - [Situation Before This Project](#situation-before-this-project)
    - [Goal of This Project](#goal-of-this-project)
    - [Process Design](#process-design)
      - [1. Ordering a Drink](#1-ordering-a-drink)
      - [2. Getting the Closed Bottle](#2-getting-the-closed-bottle)
      - [3. Opening the Closed Bottle](#3-opening-the-closed-bottle)
      - [4. Pouring the Drink](#4-pouring-the-drink)
      - [5. Serving the Drink](#5-serving-the-drink)
  - [Executing the Program](#executing-the-program)
    - [Initial Positioning](#initial-positioning)
    - [Starting the CPEE Process](#starting-the-cpee-process)
    - [Ordering on the Webpage](#ordering-on-the-webpage)
    - [Preparation of Drinks](#preparation-of-drinks)
    - [Serving the Order](#serving-the-order)
    - [Demo](#demo)
    - [Execution Times](#execution-times)
  - [Possible Future Projects](#possible-future-projects)
    - [1. Automated Bottle Detection](#1-automated-bottle-detection)
    - [2. Automated Bottle Supply](#2-automated-bottle-supply)
    - [3. Advanced Ordering Interface](#3-advanced-ordering-interface)
---
# Idea

## Situation Before This Project
As its name suggests, the Cocktail Robot was previously only able to serve cocktails. However, as some people may dislike cocktails or alcoholic drinks in general, the robot lacked the functionality to serve other drinks. Therefore, adding the ability to let the robot serve drinks from closed, crown-capped bottles greatly increases its user base.

## Goal of This Project
After successfully implementing this project, the cocktail robot can grab crown-capped bottles, open them, pour their contents into glasses, and serve them to a customer. Additionally, the robot will do this in a way that ensures foaming beverages (i.e., beer) can be served with a stable foam head.

## Process Design
To achieve the above-stated project goal, the process of pouring a drink from a closed, crown-capped bottle is divided into multiple subprocesses.

### 1. Ordering a Drink
The process begins with the user. Through a dedicated website, the user can place an order and provide additional instructions. To cover extra use cases, the user can specify whether the bottle has already been opened and decide if one or two drinks should be made.

<div style="text-align:center"><img src="orderingWebpage.png" /></div>

The page is fully responsive and can be accessed via a mobile device. To simplify the ordering process, the link to the webpage can be opened via a QR code placed near the robot.

The webpage for ordering a drink is available at: https://lehre.bpm.in.tum.de/~go56jiw/orderBeer/

**Note:** For the robot to execute the order, the CPEE process needs to be started before ordering.

<div style="text-align:center"><img src="qrCodeWebpage.png" /></div>

The code for the webpage and the PHP files that forward user input to the CPEE process engine can be found in this repository in the "code" folder.

### 2. Getting the Closed Bottle
The closed bottle needs to be placed in a predetermined position by a human operator. During process execution, the robot grabs the closed bottle from this position and places it in a different location to open it.

### 3. Opening the Closed Bottle
In this phase, a special 3D-printed adapter is used to hold the bottle opener. This adapter is easy for the robot to hold and press down on to remove the crown cap from the closed bottle. The adapter sits in an outer mount fitted with a plate, which ensures that the bottle opener self-alligns its orientation everytime it is place in the mount.

As the cap can get stuck within the opener, the robot moves the opener over a strong magnet for a short time. The magnet pulls the cap out of the opener ensuring a successful opening during the next program execution.

<div style="text-align:center"><img src="bottleOpener.png" /></div>

The CAD construction files for the 3D-printed bottle opener parts can be accessed via the following link: https://cad.onshape.com/documents/6a5412c4e68d0fce2ab7888f/w/e2a39a63512e6414095e9b9c/e/d7c2ca389113a15bfc2ea8c5?renderMode=0&uiState=66e17026db572617a75261e5

### 4. Pouring the Drink
The carbonation of beverages can cause them to foam heavily when poured straight into a glass. To ensure a steady flow without excessive foam production, the glass is first placed on a special 3D-printed slope at a 45° angle.

<div style="text-align:center"><img src="glassHolder.png" /></div>

After filling most of the glass on the holding device, the robot returns the glass to its initial position. The robot then grabs the opened bottle again and pours a small amount into the glass to create a foam head before serving.

As one bottle holds enough liquid for two drinks, the customer can order two drinks at once. In this case, both glasses are filled successively on the slope and "foamed up" afterward.

The CAD construction files for the 3D-printed glass holder parts can be accessed via the following link: https://cad.onshape.com/documents/83273c00850ef1c1cad62c91/w/5cc8dd61ae3197134bb7c1b9/e/b5ddfee44e0f972412c45bbc?renderMode=0&uiState=66e173128ab39f00f015a33b

### 5. Serving the Drink
In the current process implementation, the user places one or two glasses in predetermined positions. The robot then takes the glasses, moves them onto the slope, and returns them to their initial positions to "foam up" and serve the drinks.

# Executing the Program

## Initial Positioning
To ensure correct program execution, all items should be placed as shown in the following picture:

<div style="text-align:center"><img src="initialPositions.png" /></div>

## Starting the CPEE Process
The CPEE program for this project can be found under:
[`Teaching/Prak/TUM-Prak-24-SS/TGeilenBier/RobotIWantABeer.xml`](https://cpee.org/hub/?stage=development&dir=Teaching.dir/Prak.dir/TUM-Prak-24-SS.dir/TGeilenBier.dir/)

The process is designed to wait for an order after being started. This is implemented by calling a PHP file that waits for changes in the `numOfBeers.txt` and `openRequired.txt` files. When both of these files are updated, the new values stored in them are returned to the CPEE and saved in local variables.

<div style="text-align:center"><img src="cpeeProcess.png" /></div>

## Ordering on the Webpage
As described above, customers can order their drinks via the dedicated webpage `orderBeer/index.php`.

When the "Order Now" button is clicked, the user input is saved to the `numOfBeers.txt` and `openRequired.txt` files, triggering the continuation of the CPEE process.

Afterward, the customer is forwarded to the page `orderBeer/orderPlaced.php`, which displays the remaining time until the order is complete.

<div style="text-align:center"><img src="orderPlaced.png" /></div>

## Preparation of Drinks
Based on the user input provided via the webpage, the CPEE calls different endpoints of the robot. The following table shows all available programs and endpoints:

| Program Name       | Endpoint URL                  |
|--------------------|-------------------------------|
| getOrder           | `https://lehre.bpm.in.tum.de/~go56jiw/getOrder.php`                  |
| placeBottle        | `https://lab.bpm.in.tum.de/ur/programs/TGeilenBier/grabBottlePutOpenSpot.urp/wait`                  |
| openBottle         | `https://lab.bpm.in.tum.de/ur/programs/TGeilenBier/grabOpenRelease.urp/wait`                  |
| placeG1OnSlope     | `https://lab.bpm.in.tum.de/ur/programs/TGeilenBier/placeG10nSlope.urp/wait`                  |
| removeG1FromSlope  | `https://lab.bpm.in.tum.de/ur/programs/TGeilenBier/removeG2FromSlope.urp/wait`                  |
| placeG2OnSlope     | `https://lab.bpm.in.tum.de/ur/programs/TGeilenBier/placeG10nSlope.urp/wait`                  |
| removeG2FromSlope  | `https://lab.bpm.in.tum.de/ur/programs/TGeilenBier/removeG2FromSlope.urp/wait`                  |
| pourDrinkOnSlope   | `https://lab.bpm.in.tum.de/ur/programs/TGeilenBier/pourDrinkOnSlope.urp/wait`                  |
| foamUp1Drink       | `https://lab.bpm.in.tum.de/ur/programs/TGeilenBier/foamUp1Drink.urp/wait`                  |
| foamUp2Drinks      | `https://lab.bpm.in.tum.de/ur/programs/TGeilenBier/foamUp2Drinks.urp/wait`                  |
| returnBottle       | `https://lab.bpm.in.tum.de/ur/programs/TGeilenBier/returnBottle.urp/wait`                  |

## Serving the Order
Once 60% of the process is complete, the customer is informed via the webpage to return to the bar.

After the execution finishes, an alert is displayed on the customer's webpage, indicating that the order is ready.

The glasses can then be safely picked up from their initial spots.

## Demo
The video below showcases the execution of the program for one drink with a closed bottle. *(Note: The video speed is increased by 4x)*

<div style="text-align:center"><img src="https://github.com/user-attachments/assets/5a084a1d-a139-4319-a5f1-ae3c50ea05a1" /></div>

## Execution Times
Depending on the number of drinks and whether the bottle is open or closed, the execution time varies. The following table shows the times for each combination:

|                | 1 Drink | 2 Drinks |
|----------------|---------|----------|
| Open bottle    |  1:44   |   2:17   |
| Closed bottle  |  2:40   |   3:13   |

The provided execution times were measured manually and may vary slightly.

---

Here's your text with the spelling and grammar errors corrected:

---

## Possible Future Projects

This project has enabled the robot to serve more drinks to its users. However, through this addition, multiple new projects can further increase the functionality of the robot:

### 1. Automated Bottle Detection
A simple feature would be for the robot to detect the size of a bottle and adjust its movements accordingly. This would allow the use of different bottles and drinks for the implemented pouring process.

### 2. Automated Bottle Supply
Currently, a user is required to place a single bottle at the designated location for the process to execute correctly. In the next step, the robot could be programmed to use its camera and a computer vision model to find unopened bottles in a bottle crate and place them at the required location. This would allow the process to be executed multiple times without the need for an operator to remove and place the bottles.

### 3. Advanced Ordering Interface
In the current setup, the web interface does not support order queues and directly forwards an order to the waiting CPEE program. A more advanced program could track incoming orders, store them, and optimize their execution (e.g., pour two drinks in the same run instead of two single pours in two runs). Additionally, the program could store the status of bottles and remember which ones are half-empty (used once) and use them for single drink orders instead of opening a new bottle. This would allow for faster service and more efficient use of resources (drinks).

---



