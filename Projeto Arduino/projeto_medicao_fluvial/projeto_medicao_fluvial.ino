//Programa : Medidor de distancia com HC-SR04
//Autor : Walison Justiniano

#include <Ultrasonic.h>     //Carrega a biblioteca Ultrasonic

#define PINO_TRIGGER  13 //Define o pino do Arduino a ser utilizado com o pino Trigger do sensor
#define PINO_ECHO     10 //Define o pino do Arduino a ser utilizado com o pino Echo do sensor

Ultrasonic ultrasonic(PINO_TRIGGER, PINO_ECHO); //Inicializa o sensor ultrasonico

void setup()
  {
  Serial.begin(9600); //Inicializa a serial
  }

void loop()
  {
  int cmMsec, invCmMsec = 7;

  long microsec  = ultrasonic.timing();  //Le os dados do sensor, com o tempo de retorno do sinal
  cmMsec = ultrasonic.convert(microsec, Ultrasonic::CM); //Calcula a distancia em centimetros
  
  //Apresenta os dados, em centimetros, no LCD e na Serial
  Serial.println(-cmMsec+invCmMsec);
  delay(1000);
}
