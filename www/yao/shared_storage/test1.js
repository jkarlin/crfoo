class TestTestTest {
  async run(urls, options) {
    if (options.name == "experimentA") {
      return 1;
    } else {
      return 2; 
    }
  }
}

sharedStorage.set("key", "value");

registerURLSelectionOperation("test-operation", TestTestTest);
