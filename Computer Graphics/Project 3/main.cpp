
#include <iostream>
#include <cmath>
#include <cstdio>
#include <cstdlib>

#include "./freeglut-3.2.1/include/GL/freeglut.h"

using namespace std;

bool leftDown = false, rightDown = false;
int lastPos[2];
float cameraPos[4] = {0,1,4,1};
int windowWidth = 640, windowHeight = 480;
double yRot = 0;
int curProblem = 1; 

float specular[] = { 1.0, 1.0, 1.0, 1.0 };
float shininess[] = { 50.0 };

void problem1() {
  int teapots = 10;
	int angl = 360/teapots;
	for (int i = 0; i < 360; i+=angl) {
    glPushMatrix();  
		glRotatef(i, 0.0f, 0.0f, 1.0f); 
		glTranslatef (1, 0, 0); 
		glutSolidTeapot(0.2); 
	  glPopMatrix();
	}

}

void problem2() {
  int num_steps = 15; 
	glPushMatrix(); 
	glTranslatef(-1.60,0,0);	
	for (int i = 0; i < num_steps; i++) {
		for(int j = 0; j <= i; j++){
			glPushMatrix();
			glTranslatef(i*0.2,0.25*j*0.2,0);
			glutSolidCube(0.2);
			glPopMatrix();
		}
	}
	glPopMatrix();
}
void problem3() {
    int height = 6;
    float distance = 0.7;
    float x = 0;
    float y = 1;
	for (int i = 0; i < height; i++) {
		for (int j = 0; j <= i; j++) {
			glPushMatrix();  
			glTranslatef (x+j*distance, y, 0);
			glutSolidTeapot(0.2);
		  glPopMatrix();
		}
		x = x-distance/2;
		y = y-0.5;
	}

}

void problem4() {
    glBegin(GL_TRIANGLES);
    glVertex3f(-0.8,0,0);
    glVertex3f(0,.4,0);
    glVertex3f(0,0,0);
    glEnd();
    glBegin(GL_TRIANGLES);
    glVertex3f(.8,0,0);
    glVertex3f(0,0.8,0);
    glVertex3f(0,0,0);
    glEnd();
 
	glPushMatrix();
	glTranslatef (-0.7, 0.2, 0);
	glPushMatrix();  
	glutSolidCube(.4);
	glTranslatef (0.34, 0.2, 0);
	glutSolidCube(0.4);
	glTranslatef (.39, 0.15, 0);
	glutSolidCube(0.4);
	glTranslatef (.4, -.15, 0);
	glutSolidCube(0.4);
	glTranslatef (.4, -.20, 0);
	glutSolidCube(0.4);
    glPopMatrix();
    glPopMatrix();                                         
}

void display() {
	glClearColor(0,0,0,0);
	glClear(GL_COLOR_BUFFER_BIT | GL_DEPTH_BUFFER_BIT);

	glDisable(GL_LIGHTING);
	glEnable(GL_DEPTH_TEST);
	glBegin(GL_LINES);
		glColor3f(1,0,0); glVertex3f(0,0,0); glVertex3f(1,0,0); // x axis
		glColor3f(0,1,0); glVertex3f(0,0,0); glVertex3f(0,1,0); // y axis
		glColor3f(0,0,1); glVertex3f(0,0,0); glVertex3f(0,0,1); // z axis
	glEnd(/*GL_LINES*/);

	glEnable(GL_LIGHTING);
	glShadeModel(GL_SMOOTH);
	glMaterialfv(GL_FRONT, GL_SPECULAR, specular);
	glMaterialfv(GL_FRONT, GL_SHININESS, shininess);
	glEnable(GL_LIGHT0);

	glMatrixMode(GL_PROJECTION);
	glLoadIdentity();
	glViewport(0,0,windowWidth,windowHeight);

	float ratio = (float)windowWidth / (float)windowHeight;
	gluPerspective(50, ratio, 1, 1000);

	glMatrixMode(GL_MODELVIEW);
	glLoadIdentity();
	gluLookAt(cameraPos[0], cameraPos[1], cameraPos[2], 0, 0, 0, 0, 1, 0);

	glLightfv(GL_LIGHT0, GL_POSITION, cameraPos);

	glRotatef(yRot,0,1,0);

	if (curProblem == 1) problem1();
	if (curProblem == 2) problem2();
	if (curProblem == 3) problem3();
	if (curProblem == 4) problem4();

	glutSwapBuffers();
}

void mouse(int button, int state, int x, int y) {
	if (button == GLUT_LEFT_BUTTON) leftDown = (state == GLUT_DOWN);
	else if (button == GLUT_RIGHT_BUTTON) rightDown = (state == GLUT_DOWN);

	lastPos[0] = x;
	lastPos[1] = y;
}

void mouseMoved(int x, int y) {
	if (leftDown) yRot += (x - lastPos[0])*.1;
	if (rightDown) {
		for (int i = 0; i < 3; i++)
			cameraPos[i] *= pow(1.1,(y-lastPos[1])*.1);
	}


	lastPos[0] = x;
	lastPos[1] = y;
	glutPostRedisplay();
}

void keyboard(unsigned char key, int x, int y) {
	curProblem = key-'0';
    if (key == 'q' || key == 'Q' || key == 27){
        exit(0);
    }
	glutPostRedisplay();
}

void reshape(int width, int height) {
	windowWidth = width;
	windowHeight = height;
	glutPostRedisplay();
}

int main(int argc, char** argv) {
	glutInit(&argc, argv);
	glutInitDisplayMode(GLUT_DOUBLE | GLUT_RGB | GLUT_DEPTH);
	glutInitWindowSize(windowWidth, windowHeight);
	glutCreateWindow("HW2");

	glutDisplayFunc(display);
	glutMotionFunc(mouseMoved);
	glutMouseFunc(mouse);
	glutReshapeFunc(reshape);
	glutKeyboardFunc(keyboard);

	glutMainLoop();

	return 0;
}
