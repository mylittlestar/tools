# 将xml转换成合适的代码 简单的DSL

require 'rexml/document'
include REXML

begin
	file = File.open("test.xml")
rescue Exception => e
	puts "文件异常"
end

doc = Document::new(file)
doc.elements.each do |elem|
	puts doc.encoding
end




