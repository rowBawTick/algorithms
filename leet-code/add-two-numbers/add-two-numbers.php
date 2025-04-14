<?php

class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

/**
 * This solution works for small numbers but not really large numbers -> integer overflow
 *
 * @param ListNode $l1
 * @param ListNode $l2
 * @return ListNode
 */
function addTwoNumbers($l1, $l2): ListNode
{
    $arrayOne = convertListNodeToArray($l1);
    $arrayTwo = convertListNodeToArray($l2);

    // reverse the array and return as number

    $numberOne = convertArrayToNumber(array_reverse($arrayOne));
    $numberTwo = convertArrayToNumber(array_reverse($arrayTwo));

    $sum = $numberOne + $numberTwo;

    $sumAsStringArray = str_split((string) $sum);

    $listNodeResult = null;
    // This reverses the array as it constructs the ListNode
    foreach ($sumAsStringArray as $number) {
        $listNodeResult = new ListNode((int) $number, $listNodeResult);
    }

    return $listNodeResult;
}

function convertListNodeToArray($listNode): array
{
    $result = [];
    while ($listNode !== null) {
        $result[] = $listNode->val;
        $listNode = $listNode->next;
    }

    return $result;
}

function convertArrayToNumber($array): int
{
    // validate each value is a single integer
    $numberAsString = implode('', $array);
    return (int)$numberAsString;
}

function printList(?ListNode $node): void {
    $values = [];
    while ($node !== null) {
        $values[] = $node->val;
        $node = $node->next;
    }
    echo "[" . implode(",", $values) . "]" . PHP_EOL;
}


// 342 + 465 = 807
$listNodeOne = new ListNode(2, new ListNode(4, new ListNode(3)));
$listNodeTwo = new ListNode(5, new ListNode(6, new ListNode(4)));
$resultOne = addTwoNumbers($listNodeOne, $listNodeTwo);
printList($resultOne);
echo "\n" ;

$listNodeOne = new ListNode(0);
$listNodeTwo = new ListNode(0);
$resultOne = addTwoNumbers($listNodeOne, $listNodeTwo);
printList($resultOne);
echo "\n" ;

$listNodeOne = new ListNode(
    9, new ListNode(
        9, new ListNode(9, new ListNode(9, new ListNode(9, new ListNode(9, new ListNode(9))))),
    )
);
$listNodeTwo = new ListNode(9, new ListNode(9, new ListNode(9, new ListNode(9))));
$resultOne = addTwoNumbers($listNodeOne, $listNodeTwo);
printList($resultOne);
echo "\n" ;