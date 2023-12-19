class SelectURLOperation {
  async run(urls, data) {
    console.log("In worklet");
    return 1;
  }
}

register('foo', SelectURLOperation);
