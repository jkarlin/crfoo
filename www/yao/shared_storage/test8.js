class TestTestTest {
  async run(options) {
    return sharedStorage.get(options.name);
  }
}

registerOperation("test-operation", TestTestTest);
