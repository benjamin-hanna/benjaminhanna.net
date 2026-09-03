//********************************************************************
//
//  Author:        Benjamin Hanna
//
//  Program #:     Programming Assignment Number
//
//  File Name:     Program0.cpp
//
//  Course:        COSC 1337 Programming Fundamentals II
//
//  Due Date:      Due Date
//
//  Instructor:    Prof. Fred Kumi
//
//  Chapter:       Chapter #
//
//  Description:   An explanation of what the program is designed to do
//
//********************************************************************

#include <iomanip>
#include <iostream>

using namespace std;

void holdScreen();
void developerInfo();

//***************************************************************
//
//  Function:     main
//
//  Description:  The main function of the program
//
//  Parameters:   None
//
//  Returns:      Zero (0)
//
//**************************************************************
int main() {
  developerInfo(); // Do not delete this statement

  cout << "Hello my name is Benjamin Hanna  " << endl;
  cout << "and this is my first C++ program at ACC." << endl;

  holdScreen();
  return 0;
}

//*********************************************************************
//
//  Function:     holdScreen
//
//  Description:  The hold screen function
//
//  Parameters:   None
//
//  Returns:      N/A
//
//*********************************************************************
void holdScreen() {
  char ch;

  cout << "\nPress any key to exit... ";
  ch = getchar();
}

//***************************************************************
//
//  Function:     developerInfo
//
//  Description:  The developer's information
//
//  Parameters:   None
//
//  Returns:      N/A
//
//**************************************************************
void developerInfo() {
  cout << "Name:     Benjamin Hanna" << endl;
  cout << "Course:   COSC 1337 Programming Fundamentals II" << endl;
  cout << "Program:  Zero" << endl << endl;
} // End of Info
