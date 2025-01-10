class Writer {
  async run(data) {
    sharedStorage.set("hello", "world");
  }
}
register('write', Writer);
