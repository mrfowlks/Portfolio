#include <iostream>
#include "BMP.h"
#include <cmath>

/*
void CirclePoints(int x, int y, int value){
  WritePixel(x,y,value);
  WritePixel(y,x,value);
  WritePixel(y,x,value);
  WritePixel(x,-y,value);
  WritePixel(-x,-y,value);
  WritePixel(-y,-x,value);
  WritePixel(-y,x,value);
  WritePixel(-x,y,value);
}

void midPoint(int radius,int value){
  int x=0;
  int y= radius;
  int d = 1-radius;
  int deltaE=3;
  int deltaSE=-2*radius+5;
  CirclePoints(x,y,value);
    while (y>x){
      if (d<0){
        d+=deltaE;
        deltaSE+=2;
      }
      else{
        d+=deltaSE;
        deltaE+=2;
        deltaSE+=4;
        y--;
      }
      x++;
      CirclePoints(x,y,value);
    }
}
*/

void genEclipse(BMP &bmp){
  int j= (pow(12,2)/2)+8; int k= (pow(6,2)/2)+8; //two oringial eclipse functions
  double center1= bmp.bmp_info_header.width/2;
  double center2= bmp.bmp_info_header.height/2;
  int x=0;int y=0;
  for (double theta=0;theta<360;theta+=0.1){
    x=j*cos(theta)+center1;
    y=k*sin(theta)+center2;
    if (y>=center2){
      bmp.set_pixel(x,y,255,255,255,0);
    }
  }
}

int main() {

    BMP bmpNew(200,200,false);
    bmpNew.fill_region(0, 0, 200, 200, 0, 0, 0, 0);
    for(int i=0;i<bmpNew.bmp_info_header.width;i++)
    {
        //bmpNew.set_pixel(i, 100, 255, 255, 255, 0); //white line
        genEclipse(bmpNew);
    }
    bmpNew.write("output.bmp");
}