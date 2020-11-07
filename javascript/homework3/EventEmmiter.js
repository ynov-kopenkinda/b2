class EventEmitter {
  constructor() {
    this.events = {};
  }
  on(event, listener) {
    if (this.events[event] != null) {
      this.events[event].push(listener);
    } else {
      this.events[event] = [listener];
    }
  }
  emit(event, ...args) {
    console.log(`Emitting event: "${event}"`);
    const events = this.events[event] || [];
    events.forEach(e => e(...args));
  }
}

export const events = new EventEmitter();