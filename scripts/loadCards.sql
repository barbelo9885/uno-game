/*
* Loads all cards used in an Uno game.
*
* A stack of Uno cards contains:
* - 1 card with the number 0 of each color
* - 2 cards with number 1-9 of each color
* - 2 skip cards of each color
* - 2 reverse cards of each color
* - 2 draw two cards of each color
* - 4 wild cards
* - 4 draw four cards
* for a total of 108 cards
*/
USE uno;

INSERT INTO card (cardID, color, value, image)
VALUES (10, 'blue', '0', 'assets/images/blue_0.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (11, 'blue', '1', 'assets/images/blue_1.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (12, 'blue', '2', 'assets/images/blue_2.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (13, 'blue', '3', 'assets/images/blue_3.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (14, 'blue', '4', 'assets/images/blue_4.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (15, 'blue', '5', 'assets/images/blue_5.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (16, 'blue', '6', 'assets/images/blue_6.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (17, 'blue', '7', 'assets/images/blue_7.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (18, 'blue', '8', 'assets/images/blue_8.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (19, 'blue', '9', 'assets/images/blue_9.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (20, NULL, 'wild', 'assets/images/wildcard.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (21, 'blue', '1', 'assets/images/blue_1.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (22, 'blue', '2', 'assets/images/blue_2.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (23, 'blue', '3', 'assets/images/blue_3.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (24, 'blue', '4', 'assets/images/blue_4.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (25, 'blue', '5', 'assets/images/blue_5.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (26, 'blue', '6', 'assets/images/blue_6.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (27, 'blue', '7', 'assets/images/blue_7.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (28, 'blue', '8', 'assets/images/blue_8.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (29, 'blue', '9', 'assets/images/blue_9.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (30, 'green', '0', 'assets/images/green_0.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (31, 'green', '1', 'assets/images/green_1.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (32, 'green', '2', 'assets/images/green_2.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (33, 'green', '3', 'assets/images/green_3.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (34, 'green', '4', 'assets/images/green_4.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (35, 'green', '5', 'assets/images/green_5.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (36, 'green', '6', 'assets/images/green_6.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (37, 'green', '7', 'assets/images/green_7.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (38, 'green', '8', 'assets/images/green_8.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (39, 'green', '9', 'assets/images/green_9.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (40, NULL, 'wild', 'assets/images/wildcard.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (41, 'green', '1', 'assets/images/green_1.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (42, 'green', '2', 'assets/images/green_2.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (43, 'green', '3', 'assets/images/green_3.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (44, 'green', '4', 'assets/images/green_4.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (45, 'green', '5', 'assets/images/green_5.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (46, 'green', '6', 'assets/images/green_6.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (47, 'green', '7', 'assets/images/green_7.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (48, 'green', '8', 'assets/images/green_8.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (49, 'green', '9', 'assets/images/green_9.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (50, 'red', '0', 'assets/images/red_0.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (51, 'red', '1', 'assets/images/red_1.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (52, 'red', '2', 'assets/images/red_2.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (53, 'red', '3', 'assets/images/red_3.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (54, 'red', '4', 'assets/images/red_4.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (55, 'red', '5', 'assets/images/red_5.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (56, 'red', '6', 'assets/images/red_6.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (57, 'red', '7', 'assets/images/red_7.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (58, 'red', '8', 'assets/images/red_8.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (59, 'red', '9', 'assets/images/red_9.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (60, NULL, 'wild', 'assets/images/wildcard.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (61, 'red', '1', 'assets/images/red_1.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (62, 'red', '2', 'assets/images/red_2.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (63, 'red', '3', 'assets/images/red_3.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (64, 'red', '4', 'assets/images/red_4.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (65, 'red', '5', 'assets/images/red_5.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (66, 'red', '6', 'assets/images/red_6.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (67, 'red', '7', 'assets/images/red_7.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (68, 'red', '8', 'assets/images/red_8.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (69, 'red', '9', 'assets/images/red_9.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (70, 'yellow', '0', 'assets/images/yellow_0.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (71, 'yellow', '1', 'assets/images/yellow_1.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (72, 'yellow', '2', 'assets/images/yellow_2.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (73, 'yellow', '3', 'assets/images/yellow_3.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (74, 'yellow', '4', 'assets/images/yellow_4.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (75, 'yellow', '5', 'assets/images/yellow_5.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (76, 'yellow', '6', 'assets/images/yellow_6.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (77, 'yellow', '7', 'assets/images/yellow_7.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (78, 'yellow', '8', 'assets/images/yellow_8.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (79, 'yellow', '9', 'assets/images/yellow_9.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (80, NULL, 'wild', 'assets/images/wildcard.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (81, 'yellow', '1', 'assets/images/yellow_1.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (82, 'yellow', '2', 'assets/images/yellow_2.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (83, 'yellow', '3', 'assets/images/yellow_3.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (84, 'yellow', '4', 'assets/images/yellow_4.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (85, 'yellow', '5', 'assets/images/yellow_5.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (86, 'yellow', '6', 'assets/images/yellow_6.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (87, 'yellow', '7', 'assets/images/yellow_7.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (88, 'yellow', '8', 'assets/images/yellow_8.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (89, 'yellow', '9', 'assets/images/yellow_9.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (90, 'blue', 'skip', 'assets/images/blue_skip.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (91, 'blue', 'skip', 'assets/images/blue_skip.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (92, 'green', 'skip', 'assets/images/green_skip.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (93, 'green', 'skip', 'assets/images/green_skip.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (94, 'red', 'skip', 'assets/images/red_skip.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (95, 'red', 'skip', 'assets/images/red_skip.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (96, 'yellow', 'skip', 'assets/images/yellow_skip.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (97, 'yellow', 'skip', 'assets/images/yellow_skip.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (98, 'blue', 'reverse', 'assets/images/blue_reverse.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (99, 'blue', 'reverse', 'assets/images/blue_reverse.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (100, 'green', 'reverse', 'assets/images/green_reverse.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (101, 'green', 'reverse', 'assets/images/green_reverse.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (102, 'red', 'reverse', 'assets/images/red_reverse.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (103, 'red', 'reverse', 'assets/images/red_reverse.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (104, 'yellow', 'reverse', 'assets/images/yellow_reverse.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (105, 'yellow', 'reverse', 'assets/images/yellow_reverse.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (106, 'blue', 'drawtwo', 'assets/images/blue_drawtwo.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (107, 'blue', 'drawtwo', 'assets/images/blue_drawtwo.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (108, 'green', 'drawtwo', 'assets/images/green_drawtwo.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (109, 'green', 'drawtwo', 'assets/images/green_drawtwo.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (110, 'red', 'drawtwo', 'assets/images/red_drawtwo.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (111, 'red', 'drawtwo', 'assets/images/red_drawtwo.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (112, 'yellow', 'drawtwo', 'assets/images/yellow_drawtwo.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (113, 'yellow', 'drawtwo', 'assets/images/yellow_drawtwo.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (114, NULL, 'drawfour', 'assets/images/drawfour.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (115, NULL, 'drawfour', 'assets/images/drawfour.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (116, NULL, 'drawfour', 'assets/images/drawfour.svg');
INSERT INTO card (cardID, color, value, image)
VALUES (117, NULL, 'drawfour', 'assets/images/drawfour.svg');
