let aaa = Object.getOwnPropertyNames(globalThis);
throw JSON.stringify(aaa, Object.keys(aaa).sort())
