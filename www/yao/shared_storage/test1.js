class TestTestTest {
  async run(urls, options) {
    sharedStorage.set("key", "value");
    if (options.name == "experimentA") {
      return 1;
    } else {
      return 2; 
    }
  }
}

registerURLSelectionOperation("test-operation", TestTestTest);
