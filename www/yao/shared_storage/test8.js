class TestTestTest {
  async run(options) {
    return sharedStorage.get(options.name);
  }
}

registerURLSelectionOperation("test-operation", TestTestTest);
