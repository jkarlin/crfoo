class TestTestTest {
  async run(options) {
    return sharedStorage.get(options.name);
  }
}

sharedStorage.get("123");

registerOperation("test-operation", TestTestTest);
