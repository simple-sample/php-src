--TEST--
054: namespace and interfaces
--SKIPIF--
<?php if (!extension_loaded("spl")) die("skip SPL is no available"); ?>
--FILE--
<?php
namespace test\ns1;

class Foo implements \SplObserver {
	function update(\SplSubject $x) {
		echo "ok\n";
	}
}

class Bar implements \SplSubject {
	function attach(\SplObserver $x) {
		echo "ok\n";
	}
	function notify() {
	}
	function detach(\SplObserver $x) {
	}
}
$foo = new Foo();
$bar = new Bar();
$bar->attach($foo);
$foo->update($bar);
?>
--EXPECT--
ok
ok
