enum ButtonState {
  ON,
  OFF,
  HELD,
};

int current = 0;
const int button_pin = 7;
const int led_pins[] = { 12, 11, 10, 9, 8, 7 };
int pins_length = sizeof(led_pins);

ButtonState previousButtonState = OFF;
ButtonState currentButtonState = OFF;

void setup()
{
  for (auto pin: led_pins)
    pinMode(pin, OUTPUT);
  pinMode(BUTTON_PIN, INPUT);
}

void on_off(int i, int d) {
  digitalWrite(led_pins[i], HIGH);
  delay(d);
  digitalWrite(led_pins[i], LOW);
}

void loop()
{
  currentButtonState = digitalRead(BUTTON_PIN) == HIGH;
  if (previousButtonState && !currentButtonState) {
    roulette();
    roulette();
    current = random(0, pins_length);
    for(int i = 0; i < pins_length; i++)
      digitalWrite(led_pins[i], (current == i) ? HIGH : LOW);
  }
  previousButtonState = currentButtonState;
}